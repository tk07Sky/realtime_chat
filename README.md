# realtime_chat
オープンキャンパス用にリアルタイム更新されるチャットが作りたかったので作りました。  
チャットDBにFirebaseを利用しています。  
js上でチャットデータの通信をさせていますが、認証用にPHPを使っているので、PHP環境必須です。  
利用する場合は、db/DBInfo.phpの中身とjs/chat.js行頭の[firebaseURL]部分を自分の環境に合わせて書き換えてください。


## 参考にさせていただいたサイト
[Firebaseでリアルタイムチャットを構築する](http://qiita.com/ryotakodaira/items/e41c3a60348a9e1c76160)
