<?php

namespace App\Controller;

use App\Entity\Category;#__toString()
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;



class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function createProduct(ManagerRegistry $doctrine): Response {
        $entityManager = $doctrine->getManager();

        $category = new Category();
        $category->setNom("Computer Peripherals");



        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrix(19);
        $product->setDescription('Ergonomic and stylish!');
        $product->setLieuxAchat('Nevers');
        $product->setPhoto(1);
        $product->setIdCat(1);
        $product->setDateAchat(new \DateTime());
        $product->setDateFinGarantie(2);
        $product->setCategory($category);
        


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($category);
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Nouveaux produit ajouter avec Id :' .$product->getId()
                            .'Nouvelle catégories ajouter avec Id :'.$category->getId());
    }
}