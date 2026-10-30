<?php

namespace App\Entity;

use App\Entity\Console;

class Game
{
    //Attributs
    private ?int $id = null;
    private string $title;
    private string $type;
    private \DateTimeImmutable $publish_at;
    private Console $console;

    //Constructeur
    public function __construct(
        string $title,
        string $type,
        \DateTimeImmutable $publish_at,
        Console $console
    )
    {
        $this->title = $title;
        $this->type = $type;
        $this->publish_at = $publish_at;
        $this->console = $console;
    }

    //Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    
    public function getType(): string
    {
        return $this->type;
    }
    public function setType(string $type): void
    {
        $this->type = $type;
    }
    
    public function getPublishAt(): \DateTimeImmutable
    {
        return $this->publish_at;
    }
    public function setPublishAt(\DateTimeImmutable $publish_at): void
    {
        $this->publish_at = $publish_at;
    }
    
    public function getConsole(): Console
    {
        return $this->console;
    }
    public function setConsole(Console $console): void
    {
        $this->console = $console;
    }
    
}
