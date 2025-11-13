<?php
include("../../include/dbConnect.php");
include("../../include/AnythingHelper.php");

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value


$searchArray = array();

## Search 
$searchQuery = " ";
if ($searchValue != '') {
   $searchValue = str_replace("+", "", $searchValue);
   $searchQuery = " AND (name LIKE :name OR email LIKE :email OR contact_no LIKE :contact_no OR message LIKE :message OR created_at LIKE :created_at) ";
   $searchArray = array(
      'name' => "%$searchValue%",
      'email' => "%$searchValue%",
      'contact_no' => "%$searchValue%",
      'message' => "%$searchValue%",
      'created_at' => "%$searchValue%",
   );
}

## Total number of records without filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM inquiry  WHERE type = 'inquiry'");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM inquiry WHERE type = 'inquiry' " . $searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $db->prepare("SELECT * FROM inquiry WHERE type = 'inquiry' " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");

// Bind values
foreach ($searchArray as $key => $search) {
   $stmt->bindValue(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach ($empRecords as $row) {
   $utc = $row['created_at']; // Assuming this is in UTC
   $dt = new DateTime($utc, new DateTimeZone('UTC'));
   $dt->setTimezone(new DateTimeZone('Asia/Dubai'));
   $time = $dt->format('d-m-Y h:i A');

   $data[] = array(
      "id" => $row['id'],
      "token" => $row['token'],
      "name" => htmlentities(manipulateString::makeNa(ucwords($row['name']))),
      "email" => htmlentities(strtolower($row['email'])),
      "contact_no" => htmlentities($row['contact_no']),
      "subject" => htmlentities($row['subject']),
      "message" => htmlentities($row['message']),
      "created_at" => $time,
      "actions" => ''
   );
}

## Response
$response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
);

echo json_encode($response);
