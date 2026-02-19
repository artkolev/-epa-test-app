<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="app_form")
     */
    public function index(Request $request): Response
    {
        if (!$this->getUser()) {
            return $this->render(
                'error/401_unauthorized.html.twig',
                [],
                new Response(null, Response::HTTP_UNAUTHORIZED)
            );
        }

        $order = new Order();
        $order->setEmail($this->getUser()->getEmail());

        $form = $this->createFormBuilder($order)
            ->add('serviceId', IntegerType::class)
            ->add('email', EmailType::class, ['default' => $this->getUser()->getEmail()])
            ->add('save', SubmitType::class, ['label' => 'Подтвердить'])
            ->getForm();

        return $this->render('form/index.html.twig', ['form' => $form->createView()]);
    }
}