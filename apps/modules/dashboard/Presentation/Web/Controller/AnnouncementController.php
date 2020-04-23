<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementRequest;
use Kun\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class AnnouncementController extends BaseController
{
	/**
	 * @var AddAnnouncementService
	 */
	protected $addAnnouncementService;

	public function initialize()
	{
		$this->addAnnouncementService = $this->getDI()->get('addAnnouncementService');
	}

	public function addAction()
	{
		$title = $this->request->getPost('title');
		$content = $this->request->getPost('content');

		try {
			$request = new AddAnnouncementRequest($title, $content);
			$this->addAnnouncementService->execute($request);
			var_dump('ok');
		} catch(\Exception $e) {
			var_dump($e->getMessage());
		}
	}

}