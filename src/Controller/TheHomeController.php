<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class TheHomeController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('<h1>Accueil</h1>');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug =null): Response
    {
       
        if($slug){

          $title = '<h2>Produits : </h2>'.u(str_replace('-',' ', $slug))->title(true);  

        }else{

            $title = '<h2>Tous les produits</h2>';
        }
        
        return new Response($title);
    }

    /*#[Route('/Produit/Mod')]
    public function Mod(): Response
    {
        

        return new Response('Troisième page, cool !');
    }*/
}
