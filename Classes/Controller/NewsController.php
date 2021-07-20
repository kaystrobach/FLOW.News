<?php

namespace KayStrobach\News\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SBS.LaPo".              *
 *                                                                        *
 *                                                                        */

use KayStrobach\News\Domain\Model\News;
use Neos\Flow\Annotations as Flow;

class NewsController extends \Neos\Flow\Mvc\Controller\ActionController {
	/**
	 * @Flow\Inject
	 * @var \KayStrobach\News\Domain\Repository\NewsRepository
	 */
	protected $newsRepository;

	/**
	 * Wird vor allen actions aufgerufen
	 */
	public function initializeAction() {

	}

	/**
	 * Liste aller eingetragenen Nachrichten anzeigen
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('allNews', $this->newsRepository->findAll());
	}

	/**
	 * Anlegen einer neuen News durch Verwaltung
	 * @return void
	 */
	public function newAction() {
		$news = new News();
		$news->setStartDate(new \DateTime('now'));
		$news->setEndDate(new \DateTime('+3month'));
		$this->view->assign('news', $news);
	}

	/**

	 * @param News $news
	 */
	public function editAction(News $news) {
		$this->view->assign('news', $news);
	}

	/**
	 * @param News $news
	 * @return void
	 */
	public function showAction(News $news) {
		$this->view->assign('news', $news);
	}

	/**
	 * @Flow\ValidationGroups({"NewsSubject","NewsContent"})
	 * @param News $news
	 */
	public function updateAction(News $news) {
		$this->newsRepository->update($news);
		$this->redirect('index');
	}

	/**
	 * @Flow\ValidationGroups({"NewsSubject","NewsContent"})
	 * @param News $news
	 */
	public function createAction(News $news) {
		$this->newsRepository->add($news);
		$this->redirect('index');
	}

	/**
	 * Löschen der News durch Verwaltung
	 * @param News $news
	 * @return void
	 */
	public function deleteAction(News $news) {
		$this->newsRepository->remove($news);
		$this->addFlashMessage('Die News wurde gelöscht.');
		$this->redirect('index');
	}
}
