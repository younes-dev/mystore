<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return new jsonResponse([
            'action'=> 'index',
            'time' => time()
        ]);

    }


    /**
     * @Route("/json", name="default_index")
     */
    public function show()
    {
        return $this->json(array( 'time' => time(),'action'=> 'show'));

    }

}