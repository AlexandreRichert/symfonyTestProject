<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/hello/{firstname}/{name}', name: 'hello')]
    public function hello(Request $request, $name, $firstname): Response
    {
        dd($request);
        return $this->render('first/hello.html.twig', [
            'nom' => $name,
            'prenom' => $firstname
        ]);
    }
}
