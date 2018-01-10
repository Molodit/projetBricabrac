<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AjaxController
    extends Controller
{
    /**
      * @Route("/ajax", name="ajax")
      */   
   public function ajaxAction (Request $objetRequest)
   {
       
   }







}