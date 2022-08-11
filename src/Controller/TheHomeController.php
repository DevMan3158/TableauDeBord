<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;



class TheHomeController extends AbstractController
{
    //Les annotations/attributs sont la méthode recommandée pour configurer les itinéraires.
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {

        // Crée un tableau 
        $produit = [

            ['GPU' => 'Rtx 3070', 'Constructeur' => 'Msi'],
            ['GPU' => 'Rtx 3090 Ti Fe', 'Constructeur' => 'Nvidia'],


        ];

        //Fonction debug (dd = deepdata)

        /*dd($produit);*/
        /*dump($produit);*/

        return $this->render('pages/homepage.html.twig', [

            'title' => 'Bienvenue sur l\'accueil',
            /*'produit' => $produit,*/

        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {

        $Catégorie = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('pages/browse.html.twig', [

            'Catégorie' => $Catégorie

        ]);
        /* if ($slug) {

            $title = '<h2>Produits : </h2>' . u(str_replace('-', ' ', $slug))->title(true);
        } else {

            $title = '<h2>Tous les produits</h2>';

             return new Response($title);
        }*/
    }

    /*#[Route('/Produit/Mod')]
    public function Mod(): Response
    {
        

        return new Response('Troisième page, cool !');
    }*/
}
