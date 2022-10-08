<?php

namespace App\Controller\Public;

use App\Entity\Public\ApplicationEntity;
use App\Form\Public\ApplicationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Contracts\Service\Attribute\Required;

class ApplicationController extends AbstractController
{

    #[Required]
    public EntityManagerInterface $entityManager;

    #[Route('/', name: 'index')]
    public function index(Request $request) : Response
    {


        $application = new ApplicationEntity();

        $form = $this->createForm(ApplicationType::class, $application);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $date = new \DateTime('now');
            $createdDate = $date->format('d-m-Y H:i');

            $application->setDate($createdDate);

            $application = $form->getData();

            $this->entityManager->persist($application);
            $this->entityManager->flush();

            return $this->render('public/application_success.html.twig');
        }

        return $this->renderForm('public/application_index.html.twig', [
            'form' => $form,
        ]);
    }
}
?>