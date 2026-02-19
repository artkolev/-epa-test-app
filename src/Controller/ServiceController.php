<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    /**
     * @Route("/service", name="app_service")
     */
    public function index(): Response
    {
        if (!$this->getUser()) {
            return $this->render(
                'error/401_unauthorized.html.twig',
                [],
                new Response(null, Response::HTTP_UNAUTHORIZED)
            );
        }

        return $this->render('service/index.html.twig');
    }
}