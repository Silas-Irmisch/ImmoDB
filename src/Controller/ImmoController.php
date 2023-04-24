<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Immobilie;
use App\Form\Type\FilterType;

class ImmoController extends AbstractController
{
	#[Route('/Immobilien', name: 'immodb')]
	public function index(Request $request, EntityManagerInterface $eM): Response
	{
		$immobilien = $eM->getRepository(Immobilie::class)->findAll();
		
		if(!$immobilien) 
		{
			throw $this->createNotFoundException('Keine Immobilien gefunden');
		}

		// Filter.
		// form initialisierung und request handling
		$form = $this->createForm(FilterType::class);
		$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
		{
            $query = array_values($form->getData());
			if(count($query) > 0)
			{
				// filter $immobilien
				$query = strtolower($query[0]);
				$immobilien = array_filter($immobilien, function($obj) use ($query)
				{
					$titel = strtolower($obj->getTitel());
					$ort = strtolower($obj->getOrt());
					return strpos($titel, $query) !== false || strpos($ort, $query) !== false || $obj->getPlz() === $query;
				});
			}
        }

		return $this->render('immodb/immoDB.html.twig', [
			'immobilien' => $immobilien,
			'form' => $form
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