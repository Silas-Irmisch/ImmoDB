<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
	#[Route('/Immobilien', name: 'immodb')]
	public function index(): Response
	{
		$hw = "Hello World!";

		return $this->render('immodb/index.html.twig', [
			'hw' => $hw
		]);
	}
}

?>