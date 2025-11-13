<?php
$responseStatus = 0;
$responseMsg = '';
require_once("../include/dbConnect.php");
require_once("../include/AnythingHelper.php");
if (!isset($_POST['name'], $_POST["email"])) {
    echo json_encode(array(
        "status" => 0,
        "message" => 'Please fill all the required fields.'
    ));
    exit();
} elseif (trim($_POST['name']) == '' || trim($_POST["email"]) == '' || trim($_POST["contact_no"]) == '') {
    echo json_encode(array(
        "status" => 0,
        "message" => 'Please fill all the required fields..'
    ));
} else {
    $token = genToken();
    $name = manipulateString::makeNull($_POST["name"]);
    $email = manipulateString::makeNull($_POST["email"]);
    $contact_no = manipulateString::makeNull($_POST["contact_no"]);
    $message = manipulateString::makeNull($_POST["message"]);
    $subject = manipulateString::makeNull($_POST["subject"]);
    $created_at = $current_date_time;

    $stmt = $db->prepare("INSERT INTO inquiry (token, name, email, contact_no, message, created_at,subject) 
                      VALUES (:token, :name, :email, :contact_no, :message, :created_at, :subject)");
    $stmt->execute([
        ':token' => $token,
        ':name' => $name,
        ':email' => $email,
        ':contact_no' => $contact_no,
        ':message' => $message,
        ':created_at' => $created_at,
        ':subject' => $subject
    ]);

    $responseStatus = 1;
    $responseMsg = 'Send Successfully.';
}

echo json_encode(array(
    "status" => $responseStatus,
    "message" => $responseMsg
));
