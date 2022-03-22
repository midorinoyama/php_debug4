<?php

// 相手の手をランダムで選ぶ
class Enemy extends Player
{
    private $choice;
    public function __construct()
    {
        $this->choice = random_int(1, 3);
    }

    public function getChoice(): string
    {
        return $this->jankenConverter($this->choice);
    }
}
