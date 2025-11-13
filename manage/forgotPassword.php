<?php
require_once("include/dbConnect.php");
require_once("include/base_.php");
require_once("include/AnythingHelper.php");

if (!isset($_POST['username']) || trim($_POST['username']) == '') {
    echo json_encode(array(
        "status" => 0,
        "message" => 'Please enter your registered email id'
    ));
    exit();
} else {
    $email = trim($_POST['username']);
    $result = $db->prepare("SELECT * FROM users WHERE username = ?");
    $result->execute([$email]);
    $check_count = $result->rowcount();
    if ($check_count > 0) {
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        if ($rows['status'] == 0) {
            echo json_encode(array(
                "status" => 0,
                "message" => 'Something went wrong, please contact us to fix.'
            ));
            exit();
        } else {
            $password = $rows['password'];
            //mail
            $name = htmlentities(ucwords($rows['name']));
            $signinLink = $base_url . 'manage/';

            $notification = '<html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <h3>Hi ' . $name . ', your password is "' .  ucwords($rows['password']) . '"</h3>
            <h3>Please update your password after login.</h3>
            </body>
            </html>';

            forgot($notification, $email);

            echo json_encode(array(
                "status" => 1,
                "message" => 'Password sent to your email.'
            ));
            exit();
        }
    } else {
        echo json_encode(array(
            "status" => 0,
            "message" => 'Sorry, this email is not registered with us'
        ));
        exit();
    }
}
