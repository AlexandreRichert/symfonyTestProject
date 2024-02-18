<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/to/do', name: 'to/do')]
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
            $this->addFlash(type: 'info', message: "La liste des todos vient d'être initialisée.");
        }
        return $this->render('to_do/index.html.twig');
    }

    #[Route('/to/do/add/{name}/{content}', name: 'todo_add')]
    public function addTodo(Request $request, $name, $content)
    {
        $session = $request->getSession();
        if ($session->has('todo')) {
            $todo = $session->get('todo');
            if (isset($todo[$name])) {
                $this->addFlash(type: 'error', message: "Le todo $name existe déjà.");
            } else {
                $todo[$name] = $content;
                $session->set('todo', $todo);
                $this->addFlash(type: 'success', message: "Le todo $name a bien été ajouté.");
            }
        } else {
            $this->addFlash(type: 'error', message: "La liste des todos n'est pas encore initialisée.");
        }

        return $this->redirectToRoute(route: 'to/do');
    }
}
