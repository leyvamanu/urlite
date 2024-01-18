<?php

namespace App\Controller;

use App\Entity\ShortURL;
use App\Form\ShortURLType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    )
    {
    }

    #[Route('/', name: 'app_main')]
    public function index(Request $request): Response
    {
        $shortURL = new ShortURL();
        $form = $this->createForm(ShortURLType::class, $shortURL);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if(!filter_var($shortURL->getOriginalUrl(), FILTER_VALIDATE_URL)) {
                dd($shortURL->getOriginalUrl());
            }
            $shortURL->generateShortCode();
            $this->entityManager->persist($shortURL);
            $this->entityManager->flush();
            $this->addFlash('succes', '');
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
