<?php
namespace KayStrobach\News\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SBS.LaPo".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Doctrine\Repository;

/**
 * @Flow\Scope("singleton")
 *
 */
class NewsRepository extends Repository {

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