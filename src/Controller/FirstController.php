<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'name' => 'Richert',
            'firstname' => 'Alexandre'
        ]);
    }

    #[Route('/hello', name: 'hello')]
    public function hello(): Response
    {
        $rand = rand(0,2);
        echo $rand;
        if ($rand ==2) {
            return $this -> redirectToRoute('first');# code...
        }
        return $this->render('first/hello.html.twig', [
            'name' => 'Richert',
            'firstname' => 'Alexandre'
        ]);
    }
}
