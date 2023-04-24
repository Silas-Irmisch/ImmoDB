<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\Immobilie;
use App\Form\Type\ImmoType;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{
	#[Route('/admin', name: 'immodb-admin')]
	public function index(Request $request, EntityManagerInterface $eM): Response
	{
		$immobilie = new Immobilie();
		$form = $this->createForm(ImmoType::class, $immobilie);

		$form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $immobilie = $form->getData();
			
			$eM->persist($immobilie);
			$eM->flush();

			echo 'Immobilie gesichert mit id '.$immobilie->getId();

			// return $this->redirectToRoute('task_success');
        }

		return $this->render('immodb/admin.html.twig', [
			'form' => $form,
		]);
	}

}

?>