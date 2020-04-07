<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    public function index()
    {
        return $this->render('index.html.twig');
    }

    public function busqueda()
    {
        return $this->render('busqueda.html.twig');
    }

}
