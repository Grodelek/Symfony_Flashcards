<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\FlashcardsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
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
    public function getDone(Request $request): Response
    {
        $queryBuilder = $this->flashcardsRepository->createDoneQueryBuilder();
        $adapter = new QueryAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $currentPage = $request->query->getInt('page', 1);
        $pagerfanta->setMaxPerPage(3);
        $pagerfanta->setCurrentPage($currentPage);
        return $this->render('boxes/done.html.twig',[
            'flashcards' => $pagerfanta->getCurrentPageResults(),
            'pager' => $pagerfanta,
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
    #[Route('api/flashcards/box-reset/{id}', name: 'card_reset', methods: ['GET'])]
    public function reset($id): Response
    {
        $flashcard = $this->flashcardsRepository->find($id);
        if(!$flashcard){
            throw new \Exception('Flashcard not found');
        }
        $flashcard->setCardStatus(NULL);
        $this->entityManager->flush();
        return $this->redirectToRoute('cards_all');
    }
}