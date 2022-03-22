<?php

// 自分が選択した手を表示 $jankenに代入
class Player
{
    public function jankenConverter(int $choice): string
    {
        $janken = '';
        switch ($choice) {
            case 1:
                $janken = 'グー';
                break;
            case 2:
                $janken = 'チョキ';
                break;
            case 3:
                $janken = 'パー';
                break;
            default:
                break;
        }
        return $janken;
    }
}
