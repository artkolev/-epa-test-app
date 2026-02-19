<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{

    /**
     * @Route("/order", name="app_order")
     */
    public function index(OrderRepository $orderRepository): Response
    {
        if (!$this->getUser()) {
            return $this->render(
                'error/401_unauthorized.html.twig',
                [],
                new Response(null, Response::HTTP_UNAUTHORIZED)
            );
        }

        $orders = $orderRepository->getOrdersByUser($this->getUser());

        return $this->render('order/index.html.twig', ['orders' => $orders]);
    }
}