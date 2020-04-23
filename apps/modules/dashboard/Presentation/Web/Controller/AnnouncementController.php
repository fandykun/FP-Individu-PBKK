<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementRequest;
use Kun\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementService;
use Kun\Dashboard\Core\Application\Service\AddAnnouncement\GetLastAnnouncementService;

/**
 * @property \Phalcon\Mvc\Controller
 */
class AnnouncementController extends BaseController
{
	/**
	 * @var AddAnnouncementService
	 */
	protected $addAnnouncementService;

	/**
	 * @var GetLastAnnouncementService
	 */
	protected $getLastAnnouncementService;

	public function initialize()
	{
		$this->addAnnouncementService = $this->getDI()->get('addAnnouncementService');
		$this->getLastAnnouncementService = $this->getDI()->get('getLastAnnouncementService');
	}

	public function addAction()
	{
		$title = $this->request->getPost('title');
		$content = $this->request->getPost('content');

		if($title == '' || $content == '') {
			throw new \Exception("Unable to add announcement");
		}

		try {
			$request = new AddAnnouncementRequest($title, $content);
			$this->addAnnouncementService->execute($request);
			var_dump('ok');
		} catch(\Exception $e) {
			var_dump($e->getMessage());
		}
	}

	public function getLastAnnouncementAction()
	{
		$announcement = $this->getLastAnnouncementService->execute();

		var_dump($announcement); die();
	}
}