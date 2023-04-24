<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Immobilie;

class ImmoController extends AbstractController
{
	#[Route('/Immobilien', name: 'immodb')]
	public function index(EntityManagerInterface $eM): Response
	{
		$immobilien = $eM->getRepository(Immobilie::class)->findAll();

		foreach($immobilien as $i)
		{
			$this->debug($i->getTitel());
		}

		if(!$immobilien) {
			throw $this->createNotFoundException('Keine Immobilien gefunden');
		}

		return $this->render('immodb/immoDB.html.twig', [
			'immobilien' => $immobilien
		]);
	}
	
	function debug($data) 
	{
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug: " . $output . "' );</script>";
	}
}

?>