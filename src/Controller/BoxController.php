<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoxController extends AbstractController
{
    #[Route('api/flashcards/box-done', name: 'box_done')]
    public function getDone(): Response
    {
        return $this->render('boxes/done.html.twig');
    }
}