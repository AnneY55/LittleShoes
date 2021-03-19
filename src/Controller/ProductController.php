<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ProductShoes;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index(): Response
    {
        $ProductShoes = $this->getDoctrine()
            ->getRepository(ProductShoes::class)
            ->findAll();

        return $this->render('product/index.html.twig', [
            'product_list' => $ProductShoes,
        ]);
    }


    /**
     * @Route("/product/accueil", name="accueil")
     */
    public function accueil() 
    {
            return $this->render('product/accueil.html.twig');
    }

    /**
     * @Route("/product/contact", name="contact")
     */
    public function contact() 
    {
            return $this->render('product/contact.html.twig');
    }
    /**
     * @Route("/product/catalogue", name="catalogue")
     */
    public function catalogue() 
    {
            return $this->render('product/catalogue.html.twig');
    }
    /**
     * @Route("/product/profil", name="profil")
     */
    public function profil() 
    {
            return $this->render('product/profil.html.twig');
    }
    /**
     * @Route("/product/panier", name="panier")
     */
    public function panier() 
    {

            return $this->render('product/panier.html.twig');
    }
    /**
     * @Route("/product/panier/add{id}", name="panier_add")
     */
    public function add($id,Request $request) 
    {
            $session = $request->getSession();

            $panier = $request->get('panier',[]);

            $panier[$id] = 1;

            return $this->render('product/panier.html.twig');
    }
    /**
     * @Route("/product/faq", name="faq")
     */
    public function faq() 
    {
            return $this->render('product/faq.html.twig');
    }
    /**
     * @Route("/product/mentions", name="mentions")
     */
    public function mentions() 
    {
            return $this->render('product/mentions.html.twig');
    }
    /**
     * @Route("/product/conditions", name="conditions")
     */
    public function conditions() 
    {
            return $this->render('product/conditions.html.twig');
    }
    /**
     * @Route("/product/guide", name="guide")
     */
    public function guide() 
    {
            return $this->render('product/guide.html.twig');
    }

    /**
     * @Route("/product/carrousel", name="carrousel")
     */
    public function carrousel() 
    {
         return $this->render('product/carrousel.html.twig');
    }
    /**
     * @Route("/product/category/{category_name}", name="category")
     */
    public function category(string $category_name) 
    {
        $ProductShoes = $this->getDoctrine()
            ->getRepository(ProductShoes::class)
            ->findBy([
                'Category' => $category_name]);

        return $this->render('product/category.html.twig', [
            "products" =>  $ProductShoes
        ]);
    }
    /**
     * @Route("/product/{id}", name="description")
     */
    public function description(int $id):Response
    {
        $ProductShoes = $this->getDoctrine()
            ->getRepository(ProductShoes::class)
            ->find($id);
              

        return $this->render('product/description.html.twig', [
        "product" => $ProductShoes 
        ]);
    }

     
}


    
