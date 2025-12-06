<?php

namespace App\Doctrine\ORM\Entity;

class Todo
{
    private int $id;
    private string $title;
    private bool $completed = false;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }
}
