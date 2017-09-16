<?php
require_once './db/UserManager.php';
$UM = new UserManager();
$userid = $_POST['userid'];
$result = $UM->searchUserData($userid);
if(!empty($result[0])) {
    $check = true;
} else {
    $check = false;
}
header('Content-type: application/json');
echo json_encode($check);
?>
