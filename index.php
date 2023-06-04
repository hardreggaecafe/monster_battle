<?php

if (isset($_POST["battle"])) {
    // モンスターと自分のHPを減らす
    $damage_mine = mt_rand(0, 5);
    $damage_monster = mt_rand(0, 5);
    $monster_hp = $_POST["monster_hp"] - $damage_monster;
    $player_lv = $_POST["player_lv"];
    $player_hp = $_POST["player_hp"] - $damage_mine;
    $msg .= "自分のダメージ" . $damage_mine . '<br>' . "モンスターのダメージ" . $damage_monster;
}else if (isset($_POST["next"])){
    // 次のモンスターとの戦い
    $monster_hp = $_POST["monster_hp"];
    $player_lv = $_POST["player_lv"];
    $player_hp = $_POST["default_player_hp"];
}else{
    // HPを計るための変数
    $monster_hp = 10;
    $player_lv = 10;
    $player_hp = 10;
}

// 基本画面表示
echo '<HTML>';
echo '<HEAD>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '</HEAD>';
echo '<BODY>';

echo 'ゆうしゃ' . '<br>' . "\n";
echo 'LV:'. $player_lv . '<br>' . "\n";
echo 'HP:'. $player_hp . '<br>' . "\n";
echo '<br>' . "\n";
echo $msg . "\n";

echo '<br>' . "\n";
echo '<br>' . "\n";

// フォームボタン
echo '<form method="post">'. "\n";
echo '<input type="hidden" name="player_lv" value="'.$player_lv.'">'. "\n";
echo '<input type="hidden" name="player_hp" value="'.$player_hp.'">'. "\n";
echo '<input type="hidden" name="monster_hp" value="'.$monster_hp.'">'. "\n";
echo '<input type="submit" name="battle" value="たたかう">'. "\n";
echo '</form>'. "\n";
echo '</BODY>';
echo '</HTML>';

// モンスターのHPが0以下になった場合
if ($monster_hp <= 0) {
    echo "モンスターを倒した!";
}
// 自分のHPが0以下になった場合
if ($player_hp <= 0) {
    // 戦闘終了フラグをたてる
    echo "ゆうしゃは力尽きた…";
    echo '<form method="post">'. "\n";
    echo '<input type="submit" name="reset" value="復活の呪文">';
    echo '</form>'. "\n";
}
?>
