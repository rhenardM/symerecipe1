<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\IngredientType;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{

// This controller display all ingredients

    #[Route('/ingredient', name: 'app_ingredient_index')]
    public function index(IngredientRepository $repository): Response
    {
        return $this->render('/ingredient/index.html.twig', [
            'ingredients' => $repository->findAll()
            
        ]);
    }

    // This controller a show a form wich create an ingredient 
    #[Route('ingredient/nouveau', 'ingredient.new', methods:['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
        ): Response
    {
        $ingredient = new Ingredient();
        $form = $this->createForm(IngredientType::class, $ingredient);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $ingredient = $form->getData();
            $manager-> persist($ingredient);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre ingredient a été créé avec success !'
            );

            return $this->redirectToRoute('app_ingredient_index');
        }
        return $this->render('/ingredient/new.html.twig', [
            'form' => $form->createView()
        ]);
    }


    // This controller a update a form wich create an ingredient 
    #[Route('/ingredient/edition/{id}', 'ingredient.edit', methods:['GET', 'POST'])]
    public function edit(): Response 
    {
        return $this->render('/ingredient/edit.html.twig');
    }

}