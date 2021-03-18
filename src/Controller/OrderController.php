<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use  Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductShoesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order")
     */
        public function index(SessionInterface $session, ProductShoesRepository $productShoesRepository)
    {
        $panier = $session->get('panier', []);
        $panierWithData = [];

        foreach($panier as $id => $quantity) {
            $panierWithData[] = [ 
                'product' => $productShoesRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;
        
        foreach($panierWithData as $item) {
            $totalItem = $item['product']->getPrice() * $item['quantity'];
            $total += $totalItem;
        }
        return $this->render('order/index.html.twig', [
            'items' => $panierWithData,
            'total' => $total
        ]);
    }

    /**
     * @Route("/order/add/{id}", name="order_add")
    */
 public function add($id, SessionInterface $session)
     {
 
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])) {
            $panier[$id]++;
        } 

        else {
            $panier[$id] = 1;
        }
        
        $session->set('panier', $panier);
        return $this->redirectToRoute("order");
     
     }
    
    /**
     * @Route("/order/remove/{id}", name="order_remove")
     */
    public function remove($id, SessionInterface $session) {
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])) {
            unset($panier[$id]);
        }

         $session->set('panier', $panier);
         return $this->redirectToRoute("order");
        }
    
}



