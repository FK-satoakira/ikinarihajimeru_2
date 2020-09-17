<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP基礎</title>
</head>
<body>
    <?php   /* check.phpの61行目あたりの<formのmethod="post"をうけとってる。 */
    
    $dsn = 'mysql:dbname=phpkiso;host=localhost'; /* [phpkiso]がデータベース名 */
    $user = 'root';                             /* ユーザー名 */
    $password = '';                             /* パスワード。本当は必要だが、今回は無し。 */
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');


    $nickname=$_POST['nickname'];
    $email=$_POST['email'];
    $goiken=$_POST['goiken'];

    // ここでも記述しないとcheck.phpからthanks.phpへの不正を防げない
    // ＝サニタイジング完成にならない
    $nickname=htmlspecialchars($nickname);
    $email=htmlspecialchars($email);
    $goiken=htmlspecialchars($goiken);
    print $nickname.'様<br>';
    print 'ご意見ありがとうございました<br>';
    print '頂いたご意見『'.$goiken.'』<br>';
    print $email.'にメールを送りましたのでご確認下さい';
    
    // $mail_sub='アンケートを受け付けました。';
    // $mail_body= $nickname."様、アンケートご協力ありがとうございました。";
    // $mail_body=html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
    // $mail_head='From: xxx@xxx.co.jp';
    // mb_language('Japanese');
    // mb_internal_encoding("UTF-8");
    // mb_send_mail($email,$mail_sub,$mail_body,$mail_head);

    // ini_set($email,$mail_sub,$mail_body,$mail_head);

    $sql = 'INSERT INTO anketo (nickname,email,goiken) VALUES ("'.$nickname.'","'.$email.'","'.$goiken.'")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print '<form method="post" action="index.html">';

    print '<input type="submit" value="トップページに戻る">';
    print '</form>';
    ?>

    
    <!-- phpの変数がよくわかってないかも。
    check.htmlの61行目あたりprint '<form method="post" action="thanks.php">';という記述になっているが、
    index.html→check.html→thanks.phpという風に、index.htmlのformのmethod="post"は効力を持つということか？
    答えは95ページいこうにかかれていそうだ。
    この疑問を持ったことはいい兆しかもしれない -->
</body>
</html>