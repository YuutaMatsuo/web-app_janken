<?php
  $player = isset($_POST['player']) ? $_POST['player'] : null;
  $cpu = rand(0, 2);
  $results = ['あなたの勝ち', 'あなたの負け', '引き分け'];
  $hands = ['グー', 'チョキ', 'パー'];

  // じゃんけんのロジック（0: グー, 1: チョキ, 2: パー）
  // 勝敗の判定 (0: 勝ち, 1: 負け, 2: 引き分け)
  if ($player !== null && $player == $cpu) {
    $result = 2; // 引き分け
  } elseif ($player !== null && (($player == 0 && $cpu == 1) || ($player == 1 && $cpu == 2) || ($player == 2 && $cpu == 0))) {
    $result = 0; // 勝ち
  } elseif ($player !== null) {
    $result = 1; // 負け
  }
