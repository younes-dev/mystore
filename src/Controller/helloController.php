<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class helloController
{
    public function bonjour(){
        return new Response("bonjour tous le monde !!");
    }

}