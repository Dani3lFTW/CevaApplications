<?php

namespace App\Controller\Admin;

use App\Entity\Admin\LoginEntity;
use App\Entity\Public\ApplicationEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\OrderBy;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser())
            return $this->redirectToRoute('list');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/applications', name: 'dashboard')]
    public function dashboard() : Response
    {
        return new Response();
    }

    #[Route('/applications/list', name: 'list')]
    public function list(EntityManagerInterface $entityManager) : Response
    {

        if (!$this->getUser())
            return $this->redirectToRoute('index');

        $repository = $entityManager->getRepository(ApplicationEntity::class)->createQueryBuilder('applications')
            ->orderBy('applications.closed', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/applications_show.html.twig', ['array' => $repository]);
    }

    #[Route('/applications/view/{application}', name: 'application_view')]
    public function view(ApplicationEntity $application, EntityManagerInterface $entityManager) : Response
    {

        if (!$this->getUser())
            return $this->redirectToRoute('index');

        $repository = $entityManager->getRepository(ApplicationEntity::class);
        $array = $repository->findAll();

        return $this->render('admin/applications_view.html.twig', ['application' => $application, 'array' => $array]);
    }
}
