<?php
require_once './db/UserManager.php';
$UM = new UserManager();
$userid = $_POST['userid'];
$pass = $_POST['pass'];
$result = $UM->searchUserData($userid, $);
header('Content-type: application/json');
echo json_encode($result);
?>
