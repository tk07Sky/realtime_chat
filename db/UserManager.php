<?php
require_once './db/DBManager.php';
class UserManager {
    public function registerUser($userid, $username, $pass) {
        $DBM = new DBManager();
        $pass = $this->passwordHash($pass);
        $DBM->insertUserData($userid, $username, $pass);
        session_start();
        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        header('Location: ./');
    }

    public function searchUserData($userid) {
        $DBM = new DBManager();
        $result = $DBM->selectUserData($userid);
        return $result;
    }

    public function login($userid, $pass) {
        $DBM = new DBManager();
        $result = $DBM->selectUserData($userid);
        if (!empty($result)) {
            if ($this->passwordVerify($pass, $result[0]['pass'])) {
                session_start();
                $_SESSION['userid'] = $result[0]['userid'];
                $_SESSION['username'] = $result[0]['username'];
                return true;
            }
        } else {
            return false;
        }
    }

    private function passwordHash($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }

    private function passwordVerify($password, $hashPass) {
        $result = password_verify($password, $hashPass);
        return $result;
    }
}
?>
