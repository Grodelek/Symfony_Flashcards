<?php
namespace App\Controller;

use App\Repository\FlashcardsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoxController extends AbstractController
{
    public function __construct(
     private FlashcardsRepository $flashcardsRepository,
     private EntityManagerInterface $entityManager,
    )
    {
    }
    #[Route('api/flashcards/box-done', name: 'box_done', methods: ['GET'])]
    public function getDone(): Response
    {
        $flashcards = $this->flashcardsRepository->findBy(['card_status' => 'Done']);
        return $this->render('boxes/done.html.twig',[
            'flashcards' => $flashcards
        ]);
    }

    #[Route('api/flashcards/box-done/{id}', name: 'mark_done', methods: ['GET'])]
    public function markAsDone($id): Response
    {
        $flashcards = $this->flashcardsRepository->find($id);
        if(!$flashcards){
            throw new \Exception('Flashcard not found.');
        }
        $flashcards->setCardStatus('Done');

        $this->entityManager->flush();

        return $this->redirectToRoute('box_done');

    }
}