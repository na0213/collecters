<?php
session_start();
require('../connect.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="utf-8">
   <meta name="robots" content="noindex,nofollow">
   <title>HTMLベーステンプレート</title>

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="../css/reset.css">
   <link rel="stylesheet" href="../css/allsea.css">

</head>
<body>
  <header>
      <h1 class="top-title">
         <a href="../top.html">COLLECTERS</a>
      </h1>
      <nav class="pc-nav">
         <ul>
            <li class="about"><a href="#">ABOUT</a></li>
            <li class="collect"><a href="../collect.html">COLLECT</a></li>
            <li class="register"><a href="../register.php">REGISTER</a></li>
            <li class="login"><a href="../login.php">LOGIN</a></li>
         </ul>
      </nav>
      <nav class="sp-nav">
         <ul>
            <li><a href="#">ABOUT</a></li>
            <li><a href="../collect.html">COLLECT</a></li>
            <li><a href="../register.php">REGISTER</a></li>
            <li><a href="../login.php">LOGIN</a></li>
            <li class="close"><span>閉じる</span></li>
         </ul>
      </nav>
      <div id="hamburger">
         <span></span>
      </div>
  </header>

  <body class="bodytop">
    <div class="main-visual-sea">
    <div class="title-flex">
        <p class="sea-regi"><span class="mm">E</span>veryone's <span class="ss">B</span>each</p>
    </div>
        <table class="table_design05">
            <p class="comment">お気にumiリスト</p>
            <tr>
                <th class="table-title">ビーチ</th>
                <th class="table-title">エリア</th>
                <th class="table-title">好きポイント</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM sea");
            $stmt->execute(); 
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results): // データが存在する場合
            ?>
            <?php foreach ($results as $result) : ?>
            <tr>
                <td>
                    <p class="c-card__text"><?php echo htmlspecialchars($result['seaname'], ENT_QUOTES); ?></p>
                </td>
                <td>
                    <p class="c-card__text"><?php echo htmlspecialchars($result['prefecture'], ENT_QUOTES); ?></p>
                </td>
                <td>
                    <p class="c-card__text"><?php echo htmlspecialchars($result['seapoint'], ENT_QUOTES); ?></p>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php else : ?>
            <p>登録されたumiはありません。</p>
            <?php endif; ?>
        </table>
   </div>
</body>

</html>