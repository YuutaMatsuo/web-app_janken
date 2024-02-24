<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>じゃんけんゲーム</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body class="game-body">
  <?php include 'janken.php'; ?>
  <h1 class="game-title">じゃんけんゲーム</h1>
  <form action="" method="post" class="game-form" id="game-form">
    <button type="button" name="player" value="0" class="game-choice">グー</button>
    <button type="button" name="player" value="1" class="game-choice">チョキ</button>
    <button type="button" name="player" value="2" class="game-choice">パー</button>
    <input type="hidden" name="player" id="player-input">
    <button type="submit" id="judge-button" class="battle-button" disabled>勝負</button>
  </form>
  <?php if (isset($result) && isset($player) && isset($cpu)) : ?>
    <div class="game-result">
      <h3>結果: <?php echo $results[$result]; ?></h3>
      <p>あなた: <?php echo $hands[$player]; ?></p>
      <p>コンピュータ: <?php echo $hands[$cpu]; ?></p>
    </div>
  <?php endif; ?>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.game-choice');
    const judgeButton = document.getElementById('judge-button');
    const playerInput = document.getElementById('player-input');

    buttons.forEach(button => {
      button.addEventListener('click', function(e) {
        e.preventDefault(); // フォームの送信を防ぐ
        buttons.forEach(btn => {
          btn.classList.remove('selected'); // 他のボタンの選択状態を解除
        });
        this.classList.add('selected'); // 選択されたボタンにスタイルを適用
        playerInput.value = this.value; // 選択された値を隠しフィールドに設定
        judgeButton.removeAttribute('disabled'); // 勝負ボタンを有効化
      });
    });

    judgeButton.addEventListener('click', function() {
      document.getElementById('game-form').submit(); // フォームを送信
    });
  });
</script>
</body>

</html>