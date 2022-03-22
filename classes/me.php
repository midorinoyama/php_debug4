<?php

// 自分の情報（名前、選んだ手）
class Me extends Player
{
    private $name;
    private $choice;

    public function __construct(string $lastName, string $firstName, int $choice)
    {
        $this->name   = $lastName.$firstName;
        $this->choice = $choice;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChoice(): string
    {
        return $this->jankenConverter($this->choice);
    }
}
