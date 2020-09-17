<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP基礎</title>
</head>
<body>
    
    <?php
        // print "wellcome.<br>";
        // print $_POST["nickname"];
        // print "様";

        $nickname=$_POST['nickname'];
        $email=$_POST['email'];
        $goiken=$_POST['goiken'];
        // クロスサイトスプクティングを防いでいる＝サニタイジング。
        $nickname=htmlspecialchars($nickname);
        $email=htmlspecialchars($email);
        $goiken=htmlspecialchars($goiken);

        // if($nickname==""){
        //     print "ニックネームが入力されてません<br>";
        // }else{
        //     print $nickname;
        //     print "様<br>";
        // }
        // if($email==""){
        //     print "emailが入力されてません<br>";
        // }else{
        //     print $email;
        //     print "<br>";
        // }
        // if($goiken==""){
        //     print "emailが入力されてません<br>";
        // }else{
        //     print $goiken;
        //     print "<br>";
        // }
        // if($nickname=="" || $email=="" || $goiken==""){
        //     print "<form>";
        //     print '<input type="button" onclick="history.back()" value="戻る">';
        //     print "</form>";
 
        // }else{
        //     print '<form method="post" action="thanks.php">';
        //     print '<input type="button" onclick="history.back()" value="戻る">';
        //     print '<input type="submit" value="OK">';
        //     print '</form>';
        // }

        // ---フラグ制御のつもり---
        $error = false;
        if($nickname==''){ $error = true; print "名前の入力欄が空です。入力してください。<br>";}
        if($email==''){ $error = true; print "メールの入力欄が空です。入力してください。<br>";}
        if($goiken==''){ $error = true; print "ご意見の入力欄が空です。入力してください。<br>";}
        if($error){
            print "<form>";
            print '<input type="button" onclick="history.back()" value="戻る">';
            print "</form>";
        }else{
            print $nickname."<br>".$email."<br>".$goiken."<br>";/* ここで確認用の入力した変数の表示をしている */
            print '<form method="post" action="thanks.php">';
            print '<input name="nickname" type="hidden" value="'.$nickname.'">';
            print '<input name="email" type="hidden" value="'.$email.'">';
            print '<input name="goiken" type="hidden" value="'.$goiken.'">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="OK">';
            print '</form>';
        }
        // type="hidden" が無いと、テキストボックスに入力したものが書かれた状態で表示される。
    ?>
</body>
</html>