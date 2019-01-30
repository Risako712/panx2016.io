

<!DOCTYPE html>

<?php 
    // フォームのボタンが押されたら
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $msg = $_POST["msg"];
            
        // 日本語をメールで送る場合のおまじない
        mb_language("ja");
        mb_internal_encoding("UTF-8");
      
// メール本文を変数bodyに格納
$body = <<< EOM

{$name} 様からのお問い合わせ


WEBフォームからお問い合わせがありました。

=================

【 お名前 】 
{$name}

【 メール 】 
{$mail}

【 メッセージ 】 
{$msg}

=================

EOM;
        
        mb_send_mail("contact@panx2016.com", "【フォームからのお問い合わせ】", $body);
        
        
        // サンクスページに画面遷移させる
        header("Location: submit.php");
        
        exit;
    }
?>

<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>PanX2016</title>
        
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="style.css">
        

        
    </head>
    
    <body>
        
        <div class="wrap2">
            
        <h2>お問い合わせ完了</h2>
        <hr width="300" color="#FF3399" size="1">
            
        <br><br><br>
            
    <!--<div class="container">-->


    <form action="submit.php" method="POST">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="mail" value="<?php echo $mail; ?>">
            <input type="hidden" name="msg" value="<?php echo $msg; ?>">
        
        <br><br><br>
         
    　　　お問い合わせありがとうございました。<br><br><br>
    　　　後ほど担当者よりご連絡をさせていただきます。<br><br><br>
    　　　今しばらくお待ちくださいませ。<br><br><br><br><br>    
    </form>
            
        </div>
        
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        <div class="footer">
            Copyright (C) 2016 PanX All Rights Reserved.
        </div>
    </body>
</html>