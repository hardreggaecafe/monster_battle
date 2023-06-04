<?php

if (isset($_POST["battle"])) {
    // モンスターと自分のHPを減らす
    $damage_mine = mt_rand(0, 5);
    $damage_monster = mt_rand(0, 5);
    $monster_hp = $_POST["monster_hp"] - $damage_monster;
    $player_lv = $_POST["player_lv"];
    $player_hp = $_POST["player_hp"] - $damage_mine;
    $default_player_hp = $_POST["default_player_hp"];
    $msg .= "自分のダメージ" . $damage_mine . '<br>' . "モンスターのダメージ" . $damage_monster;
}else if (isset($_POST["next"])){
    // 次のモンスターとの戦い
    $monster_hp = $_POST["monster_hp"];
    $player_lv = $_POST["player_lv"];
    $player_hp = $_POST["default_player_hp"];
    $default_player_hp = $_POST["default_player_hp"];
}else{
    // HPを計るための変数
    $monster_hp = 10;
    $player_lv = 10;
    $player_hp = 20;
    $default_player_hp = 20;
}

// 基本画面表示
echo '<HTML>';
echo '<HEAD>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '</HEAD>';
echo '<BODY>';

echo '<img style="width: 100px;" src="https://3.bp.blogspot.com/-la0WXIEj3Og/VA7mbmBn1UI/AAAAAAAAmQY/FlJynwAD9ro/s450/yuusya_game.png">' . '<br>' . "\n";
echo 'ゆうしゃ' . '<br>' . "\n";
echo 'LV:'. $player_lv . '<br>' . "\n";
echo 'HP:'. $player_hp . '<br>' . "\n";
echo '<br>' . "\n";
echo '<img style="width: 100px;" src="https://www.publicdomainpictures.net/pictures/420000/velka/image-1634028241i3M.png">' . '<br>' . "\n";
echo $msg . "\n";

echo '<br>' . "\n";
echo '<br>' . "\n";

// フォームボタン
echo '<form method="post">'. "\n";
echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">'. "\n";
echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">'. "\n";
echo '<input type="hidden" name="default_player_hp" value="'.$default_player_hp.'">'. "\n";
echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">'. "\n";
echo '<input type="submit" name="battle" value="たたかう">'. "\n";
echo '</form>'. "\n";
echo '</BODY>';
echo '</HTML>';

// モンスターのHPが0以下になった場合
if ($monster_hp <= 0) {
    // 戦闘終了フラグをたてる
    $isWin = True;
    echo "モンスターを倒した!";
}
// 自分のHPが0以下になった場合
if ($player_hp <= 0) {
    echo "ゆうしゃは力尽きた…";
    echo '<form method="post">'. "\n";
    echo '<input type="submit" name="reset" value="復活の呪文">';
    echo '</form>'. "\n";
}

// 戦闘終了フラグが立っていたら
if ($isWin == True) {
    // 次のモンスターと戦うボタンを表示
    $monster_hp = mt_rand(5, 20);
    echo "ゆうしゃはレベルが1あがった。HPも1あがった。";
    echo '<form method="post">'. "\n";
    echo '<input type="hidden" name="player_lv" value="'.++$player_lv.'">'. "\n";
    echo '<input type="hidden" name="default_player_hp" value="'. ++$default_player_hp .'">'. "\n";
    echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">'. "\n";
    echo '<input type="submit" name="next" value="次のモンスターと戦う">';
    echo '</form>'. "\n";
}
?>
