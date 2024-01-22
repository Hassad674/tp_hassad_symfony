<?php
namespace App\Controller;

use App\Form\UserLoginType;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_security', methods: ['POST'])]
    public function login(Request $request): Response
    {
        $form = $this->createForm(UserLoginType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ici Hassad tu vas verifier si le fomulaire à été soumis et si il est valide
            $user = $form->getData();
            dump($user);

            // Ici Hassad tu gère l'objet $user comme tu veux 
            
            return $this->render('login.html.twig', [
                'form' => $form->createView(),
            ]);
        }

        return $this->render('login.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
