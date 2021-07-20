<?php
namespace KayStrobach\News\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SBS.LaPo".              *
 *                                                                        *
 *                                                                        */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Doctrine\Repository;
use Neos\Flow\Persistence\QueryInterface;

/**
 * @Flow\Scope("singleton")
 *
 */
class NewsRepository extends Repository {
	/**
	 * @var array
	 */
	protected $defaultOrderings = array(
		'startDate' => QueryInterface::ORDER_DESCENDING
	);

	/**
	 * @return \TYPO3\Flow\Persistence\QueryResultInterface
	 */
	public function findVisible() {
		$query = $this->createQuery();
		$query->matching(
			$query->logicalAnd(
				array(
					$query->greaterThan('endDate', new \DateTime('now')),
					$query->lessThan('startDate', new \DateTime('now'))
				)
			)
		);
		return $query->execute();
	}
}
