// データベースと接続する
var messagesRef = new Firebase('https://firebaseURL');

var messageField = $('#messageInput');
var nameField = $('#nameInput');
var idField = $('#idInput');
var messageList = $('#messages');
// ENTERキーを押した時に発動する
messageField.keypress(function (e) {
    if (e.keyCode == 13) {
        if(messageField.val() != "") {
            //フォームに入力された情報
            var userid = idField.val();
            var username = nameField.val();
            var message = messageField.val();
            //データベースに保存する
            messagesRef.push({id:userid, name:username, text:message});
            messageField.val('');

            $('#scroller').scrollTop($('#messages').height());
        }
    }
});

// データベースにデータが追加されたときに発動する
messagesRef.limitToLast(10).on('child_added', function (snapshot) {
    //取得したデータ
    var data = snapshot.val();
    var userid = data.id;
    var username = data.name;
    var message = data.text;
    //取得したデータの名前が自分の名前なら右側に吹き出しを出す
    if ( userid == idField.val() ) {

        var messageElement = $("<il><p class='sender_name me'>" + username + "</p><p class='right_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");

    } else {

        var messageElement = $("<il><p class='sender_name'>" + username + "</p><p class='left_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");

    }
    //HTMLに取得したデータを追加する
    messageList.append(messageElement)

    //一番下にスクロールする
    messageList[0].scrollTop = messageList[0].scrollHeight;
});
