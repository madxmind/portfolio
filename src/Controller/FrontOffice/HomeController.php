<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="home")
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return $this->render('front_office/home.html.twig');
    }
}
