<?php

namespace KayStrobach\News\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SBS.LaPo".              *
 *                                                                        *
 *                                                                        */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class News {
	/**
	 * @var string
	 * @Flow\Validate(type="String")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=3, "maximum"=255 })
	 * @Flow\Validate(type="NotEmpty", validationGroups={"NewsSubject"})
	 */
	protected $subject;

	/**
	 * @var string
	 * @Flow\Validate(type="String")
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $foreword = '';

	/**
	 * @var string
	 * @Flow\Validate(type="String")
	 * @Flow\Validate(type="StringLength", options={ "minimum"=3 })
	 * @Flow\Validate(type="NotEmpty", validationGroups={"NewsContent"})
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $content = '';

	/**
	 * @var \DateTime
	 */
	protected $startDate;

	/**
	 * @var \DateTime
	 */
	protected $endDate;

	/**
	 * @return string
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * @param string $subject
	 * @return void
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * @return string
	 */
	public function getForeword() {
		return $this->foreword;
	}

	/**
	 * @param string $foreword
	 * @return void
	 */
	public function setForeword($foreword) {
		$this->foreword = $foreword;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * @return \DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	/**
	 * @param \DateTime $startDate
	 * @return void
	 */
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	/**
	 * @param \DateTime $endDate
	 * @return void
	 */
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}

}
