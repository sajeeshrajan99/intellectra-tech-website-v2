<?php
include("../../include/auth.php");

$responseStatus = 0;
$responseMsg = '';
if (isset($_SESSION['SESS_ADMINID']) && (trim($_SESSION['SESS_ADMINID']) != '')) {
    require_once("../../include/dbConnect.php");
    require_once("../../include/AnythingHelper.php");
    if (!isset($_POST['token'])) {
        echo json_encode(array(
            "status" => 0,
            "message" => 'Something went wrong!'
        ));
        exit();
    } else {
        $token = $_POST['token'];

        $stmt = $db->prepare("DELETE FROM inquiry WHERE token = :token");
        $stmt->execute([':token' => $token]);

        $responseStatus = 1;
        $responseMsg = 'Inquiry Deleted.';
    }
} else {
    $responseMsg = 'Session Expired!';
}

echo json_encode(array(
    "status" => $responseStatus,
    "message" => $responseMsg
));
