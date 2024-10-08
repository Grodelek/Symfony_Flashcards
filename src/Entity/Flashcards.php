<?php

namespace App\Entity;

use App\Repository\FlashcardsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlashcardsRepository::class)]
class Flashcards
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $topic = null;

    #[ORM\Column(length: 255)]
    private ?string $answer = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'flashcards')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $card_status = null;


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopic(): ?string
    {
        return $this->topic;
    }

    public function setTopic(string $topic): static
    {
        $this->topic = $topic;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): static
    {
        $this->answer = $answer;

        return $this;
    }

    public function getCardStatus(): ?string
    {
        return $this->card_status;
    }

    public function setCardStatus(?string $card_status): static
    {
        $this->card_status = $card_status;

        return $this;
    }
}
