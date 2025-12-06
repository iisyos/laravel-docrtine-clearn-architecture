<?php

namespace App\Doctrine\ORM\Entity;

class Todo
{
    private int $id;
    private Title $title;
    private bool $completed = false;

    public function __construct(Title $title)
    {
        $this->title = $title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }
}
