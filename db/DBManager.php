<?php
require_once './db/DBInfo.php';
class DBManager {
    private $myPDO;

    private function dbConnect() {
        try {
            $DBI = new DBInfo();
            $dsn = 'mysql:host=' . $DBI->dbHost . ';dbname=' . $DBI->dbName . ';charset=utf8';
            $user = $DBI->username;
            $pass = $DBI->password;
            $this->myPDO = new PDO($dsn, $user, $pass, array(PDO::ATTR_EMULATE_PREPARES => true));
        } catch (PDOException $e) {
            print('接続に失敗しました。' . $e->getMessage());
            throw $e;
        }
    }

    private function dbDisconnect() {
        unset($myPDO);
    }

    public function insertUserData($userid, $username, $pass) {
        try {
            $this->dbConnect();
            $stmt = $this->myPDO->prepare('INSERT INTO User(user_id, user_name, pass) VALUES (:userid, :username, :pass)');
            $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            $stmt->execute();
            $this->dbDisconnect();
        } catch (PDOException $e) {
            print('登録に失敗しました。' . $e->getMessage());
            throw $e;
        }
    }

    public function selectUserData($userid) {
        try {
            $this->dbConnect();
            $stmt = $this->myPDO->prepare('SELECT * FROM User WHERE user_id = :userid');
            $stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
            $stmt->execute();
            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $userList = array();
                $userList['userid'] = $row['user_id'];
                $userList['username'] = $row['user_name'];
                $userList['pass'] = $row['pass'];
                array_push($result, $userList);
            }
            $this->dbDisconnect();
            return $result;
        } catch (PDOException $e) {
            print('検索に失敗しました。' . $e->getMessage());
            throw $e;
        }
    }
}
?>
