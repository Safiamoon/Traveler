<?php
// src/Controller/TravelerController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TravelerController
{
  public function index()
  {
    $content = "Welcome !";

    return new Response($content);
  }
}