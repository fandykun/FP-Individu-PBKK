<?php

namespace Kun\Dashboard\Core\Application\Service\GetAllAnnouncement;

use Kun\Dashboard\Core\Domain\Repository\AnnouncementRepositoryInterface;

class GetAllAnnouncementService
{
	protected AnnouncementRepositoryInterface $repository;

	public function __construct(AnnouncementRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute()
	{
		try {
			$announcements = $this->repository->getAllAnnouncement();
		} catch (\Exception $e) {
			echo $e->getMessage();
		}

		return $announcements;
	}
}