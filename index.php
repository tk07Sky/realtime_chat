<?php
session_start();
if(!isset($_SESSION['userid']) && !isset($_SESSION['username'])){
    header('Location: ./welcome.php');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>オープンキャンパスチャット</title>
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/chat_style.css">
</head>
<body>
<div class="panel-default">
    <div class="panel-heading">
        <h1>オープンキャンパスチャット</h1>
        <button type="button" onClick="location.href='./logout.php'">ログアウト</button>
    </div>
    <div class="head-space"></div>
    <div id="scroller" class="panel-body">
        <ul id='messages'>
        </ul>
    </div>
    <div class="panel-footer">
        <input type='text' class="form-control" id="messageInput" placeholder="メッセージ内容を入力してください">
        <input type="hidden" id="nameInput" value="<?php echo $_SESSION['username']; ?>">
        <input type="hidden" id="idInput" value="<?php echo $_SESSION['userid']; ?>">
    </div>
</div>
<script src="./js/chat.js"></script>
</body>
</html>
