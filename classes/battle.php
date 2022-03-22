<?php

// 自分の手と相手の手を取得、判定
class Battle
{
    private $first;
    private $second;
    public function __construct(Me $me, Enemy $enemy)
    {
        $this->first  = $me->getChoice();
        $this->second = $enemy->getChoice();
    }

    private function judge(): string
    {
        if ($this->first === $this->second) {
            return '引き分け';
        }

        if ($this->first === 'グー' && $this->second === 'チョキ') {
            return '勝ち';
        }

        if ($this->first === 'グー' && $this->second === 'パー') {
            return '負け';
        }

        if ($this->first === 'チョキ' && $this->second === 'グー') {
            return '負け';
        }

        if ($this->first === 'チョキ' && $this->second === 'パー') {
            return '勝ち';
        }

        if ($this->first === 'パー' && $this->second === 'グー') {
            return '勝ち';
        }

        if ($this->first === 'パー' && $this->second === 'チョキ') {
            return '負け';
        }
    }

    // 勝った回数をresultに登録
    private function countVictories()
    {
        if ($this->judge() === '勝ち') {
            //セッション変数に登録
            //$_SESSION['result'] = 1;
            $_SESSION['result']++;
        }
    }

    public function getVictories()
    {
        $this->countVictories();
        return $_SESSION['result'];
    }

    public function showResult()
    {
        return $this->judge();
    }
}
