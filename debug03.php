<?php
// デバック練習問題
// あらかじめ壊れているプログラムを用意してあります。
// コードを読みデバックしつつジャンケンゲームを完成させてください。
// 判定が勝った時のみ勝利回数を表示させてください。
// 例)
// 山田太郎はグーを出しました。
// 相手はチョキを出しました。
// 勝敗は勝ちです。
// 3回目の勝利です。

require_once 'classes/player.php';
require_once 'classes/me.php';
require_once 'classes/enemy.php';
require_once 'classes/battle.php';

// セッションデータを初期化(セッションIDの新規発行or既存のセッションを読み込む)
session_start();
if (! isset($_SESSION['result'])) {
    $_SESSION['result'] = 0;
}

if (! empty($_POST)) {
    $lastName         = $_POST['last_name'];
    $firstName        = $_POST['first_name'];
    $choice              = $_POST['choice'];
    $me = new Me($lastName, $firstName, $choice);
    $enemy = new Enemy();
    echo $me->getName().'は'.$me->getChoice().'を出しました。';
    echo '<br>';
    echo '相手は'.$enemy->getChoice().'を出しました。';
    echo '<br>';
    $battle = new Battle($me, $enemy);
    echo '勝敗は'.$battle->showResult().'です。';
    if ($battle->showResult() === '勝ち') {
        echo '<br>';
        echo $battle->getVictories().'回目の勝利です。';
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>デバック練習</title>
</head>
<body>
    <section>
    <form action='./debug03.php' method="post">
        <label>姓</label>
        <input type="text" name="last_name" value="<?php echo '山田' ?>" />
        <label>名</label>
        <input type="text" name="first_name" value="<?php echo '太郎' ?>" />
        <select name='choice'>
            <option value=0 >--</option>
            <option value=1 >グー</option>
            <option value=2 >チョキ</option>
            <option value=3 >パー</option>
        </select>
        <input type="submit" value="送信する"/>
    </form>
    </section>
</body>
</html>
