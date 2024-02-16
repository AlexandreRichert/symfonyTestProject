<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/to/do', name: 'app_to_do')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        // Si j'ai mon tableau de todo dans ma session je ne fais que l'afficher
        // sinon je l'initialise puis l'affiche
        if (!$session->has('todo')) {
            $todo = [
                'achat' => 'acheter clé usb',
                'cours' => 'finaliser mon cours',
                'correction' => 'corriger les exercices'
            ];
            $session->set('todo', $todo);
        }
        return $this->render('to_do/index.html.twig');
    }

    #[Route('/to/do/{name}/{content}', name: 'todo_add')]
    public function addTodo(Request $request, $name, $content): 
    {
        
    }
}
