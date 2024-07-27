<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Controller',
        ]);
    }
 #[Route('/login', name: 'login' )]
 public  function login() :Response {
    return $this -> render('Login/Login.html.twig');
 }
 #[Route('/prod', name:'prod' )]
 public  function prod() :Response {
    return $this -> render('product/product2.html.twig');
 }
 #[Route('/cart', name:'cart' )]
 public  function cart() :Response {
    return $this -> render('cart/cart.html.twig');
 }
 #[Route('/product', name:'product' )]
 public  function product() :Response {
    return $this -> render('product/product.html.twig');
 }
 #[Route('/checkout', name:'checkout' )]
 public  function checkout() :Response {
    return $this -> render('checkout/addresspage.html.twig');
 }
 #[Route('/prodetail', name:'prodetail' )]
 public  function prodetail() :Response {
    return $this -> render('product/productdetails.html.twig');
 }
}
