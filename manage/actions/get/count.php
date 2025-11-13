<?php
require_once("../../include/dbConnect.php");
/*
$result = $db->prepare("SELECT * FROM projects");
$result->execute();
$projects = $result->rowcount();
$response[] = array(
    "id" => "projects",
    "value" => $projects
);*/

$result = $db->prepare("SELECT * FROM inquiry WHERE type = 'inquiry'");
$result->execute();
$inquiries = $result->rowcount();
$response[] = array(
    "id" => "inquiries",
    "value" => $inquiries
);
/*
$result = $db->prepare("SELECT * FROM reviews");
$result->execute();
$reviews = $result->rowcount();
$response[] = array(
    "id" => "reviews",
    "value" => $reviews
);
*/
echo json_encode(array(
    "status" => 1,
    "data" => $response
));
