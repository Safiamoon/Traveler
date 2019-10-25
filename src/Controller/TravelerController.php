<?php
// src/Controller/TravelerController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TravelerController extends AbstractController
{
  public function index(Environment $twig)
  {
    $content = $twig->render('Traveler/index.html.twig');

    return new Response($content);
  }
}