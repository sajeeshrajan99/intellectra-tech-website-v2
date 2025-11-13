<?php
require_once '../AnythingHelper.php';
require_once '../dbConnect.php';

$message = 'Unauthorized action.';
$status = 0;
$redirect_to = '';
$response = [];

$form_type = $_POST['form_type'] ?? null;
$token = $_POST['token'] ?? null;
$recaptcha_secret = '6LcNVoIrAAAAAKT3xCTz51bvq0AEZf_I06HQuj30';

// reCAPTCHA Verification
$verifyURL = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_response = file_get_contents($verifyURL . '?secret=' . $recaptcha_secret . '&response=' . $token);
$responseData = json_decode($recaptcha_response);

if (!($responseData->success && $responseData->score >= 0.5)) {
    $message = 'Suspicious activity detected.';
    echo json_encode(["status" => $status, "message" => $message, "response" => $response, "redirect_to" => $redirect_to]);
    exit;
}

// File renaming and moving helper
function renameAndMoveUploadedFile($file, $namePrefix, $destinationFolder = '../uploads/cv/')
{
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $safeName = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($namePrefix));
    $newFileName = $safeName . '_' . time() . '.' . $ext;
    $targetPath = rtrim($destinationFolder, '/') . '/' . $newFileName;

    if (!is_dir($destinationFolder)) {
        mkdir($destinationFolder, 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $newFileName;
    }

    return null;
}

// Validate Common Fields
// $job_token = GenerateToken::UUIDV4();
$dated = GetDateTime::todayKolkata();
$created_by = 'website';

$job_token = manipulateString::makeNull($_POST['checkToken'] ?? '');
$job_title = manipulateString::makeNull($_POST['job_title'] ?? '');
$job_type = manipulateString::makeNull($_POST['job'] ?? '');
$applicant_email = manipulateString::makeNull($_POST['email'] ?? '');
$applicant_name = trim(($_POST['first_name'] ?? '') . ' ' . ($_POST['last_name'] ?? ''));
$applicant_phone = $_POST['phone_number'] ?? $_POST['phone'] ?? '';
$source = $_POST['source'] ?? null;

if ($form_type == null) {
    $response[] = ["id" => "form_type", "message" => "Invalid form type."];
}
if ($applicant_name == '') {
    $response[] = ["id" => "first_name", "message" => "Enter your name."];
}
if ($applicant_email == '') {
    $response[] = ["id" => "email", "message" => "Enter your email."];
}
if ($applicant_phone == '') {
    $response[] = ["id" => "phone_number", "message" => "Enter your phone number."];
}

if (!empty($response)) {
    $message = '';
    echo json_encode(["status" => $status, "message" => $message, "response" => $response, "redirect_to" => $redirect_to]);
    exit;
}

// Insert with Transaction
try {
    $db->beginTransaction();

    $sql = "SELECT COUNT(*) FROM job_requests WHERE token = :token";
    $stmt = $db->prepare($sql);
    $stmt->execute([':token' => $job_token]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $status = 1;
        $message = "Application submitted successfully.";
    } else {

        // Insert into job_requests
        $stmt_job = $db->prepare("INSERT INTO job_requests 
        (token, job_title, job_code, job_type, applicant_name, applicant_email, applicant_phone, source, application_type, created_at, created_by)
        VALUES (:token, :job_title, NULL, :job_type, :name, :email, :phone, :source, :application_type, :created_at, :created_by)");

        $stmt_job->execute([
            ':token' => $job_token,
            ':job_title' => $job_title,
            ':job_type' => $form_type,
            ':name' => $applicant_name,
            ':email' => $applicant_email,
            ':phone' => $applicant_phone,
            ':source' => $source,
            ':application_type' => ucfirst($form_type),
            ':created_at' => $dated,
            ':created_by' => $created_by
        ]);

        if ($form_type === 'uk') {
            $cvFile = renameAndMoveUploadedFile($_FILES['cv'], $applicant_name.'_cv');
            $cover_letterFile = null;
            if (isset($_FILES['cover_letter']) && $_FILES['cover_letter']['error'] === UPLOAD_ERR_OK) {
                $cover_letterFile = renameAndMoveUploadedFile($_FILES['cover_letter'], $applicant_name.'_coverletter');
            }
            $additional_docFile = null;
            if (isset($_FILES['additional_doc']) && $_FILES['additional_doc']['error'] === UPLOAD_ERR_OK) {
                $additional_docFile = renameAndMoveUploadedFile($_FILES['additional_doc'], $applicant_name.'_attachment');
            }

            $stmt = $db->prepare("INSERT INTO uk_applications 
            (token, title, first_name, last_name, preferred_name, address1, city, postal_code, country, email, phone_number, country_code, worked_before, experience, education, skills, cv_file, websites, linkedin, ethnicity, nationality, sexual_orientation, gender_identity, disabilities, consent, created_at, cover_letter, additional_doc, eligibility)
            VALUES (:token, :title, :first_name, :last_name, :preferred_name, :address1, :city, :postal_code, :country, :email, :phone_number, :country_code, :worked_before, :experience, :education, :skills, :cv_path, :websites, :linkedin, :ethnicity, :nationality, :sexual_orientation, :gender, :disabilities, :consent, :created_at, :cover_letter, :additional_doc, :eligibility)");

            $stmt->execute([
                ':token' => $job_token,
                ':title' => $_POST['title'] ?? null,
                ':first_name' => $_POST['first_name'] ?? null,
                ':last_name' => $_POST['last_name'] ?? null,
                ':preferred_name' => $_POST['preferred_name'] ?? null,
                ':address1' => $_POST['address1'] ?? null,
                ':city' => $_POST['city'] ?? null,
                ':postal_code' => $_POST['postal_code'] ?? null,
                ':country' => $_POST['country'] ?? null,
                ':email' => $_POST['email'] ?? null,
                ':phone_number' => $_POST['phone_number'] ?? null,
                ':country_code' => $_POST['country_code'] ?? null,
                ':worked_before' => $_POST['worked_before'] ?? null,
                ':experience' => $_POST['experience'] ?? null,
                ':education' => $_POST['education'] ?? null,
                ':skills' => $_POST['skills'] ?? null,
                ':cv_path' => $cvFile ?? null,
                ':websites' => $_POST['websites'] ?? null,
                ':linkedin' => $_POST['linkedin'] ?? null,
                ':ethnicity' => $_POST['ethnicity'] ?? null,
                ':nationality' => $_POST['nationality'] ?? null,
                ':sexual_orientation' => $_POST['sexual_orientation'] ?? null,
                ':gender' => $_POST['gender'] ?? null,
                ':disabilities' => $_POST['disabilities'] ?? null,
                ':consent' => isset($_POST['consent']) ? 1 : 0,
                ':created_at' => $dated,
                ':cover_letter' => $cover_letterFile ?? null,
                ':additional_doc' => $additional_docFile ?? null,
                ':eligibility' => $_POST['eligibility'] ?? null
            ]);
        } elseif ($form_type === 'india') {
            $attachmentFile = renameAndMoveUploadedFile($_FILES['attachment'], $applicant_name.'_cv');

            $stmt = $db->prepare("INSERT INTO india_applications 
            (token, first_name, last_name, email, phone_number, country, state, place, designation, experience, additional_information, attachment_file, consent, created_at)
            VALUES (:token, :first_name, :last_name, :email, :phone, :country, :state, :place, :designation, :experience, :additional_info, :file_path, :privacypolicy, :created_at)");

            $stmt->execute([
                ':token' => $job_token,
                ':first_name' => $_POST['first_name'] ?? null,
                ':last_name' => $_POST['last_name'] ?? null,
                ':email' => $_POST['email'] ?? null,
                ':phone' => $_POST['phone'] ?? null,
                ':country' => $_POST['country'] ?? null,
                ':state' => $_POST['state'] ?? null,
                ':place' => $_POST['place'] ?? null,
                ':designation' => $_POST['job_title'] ?? null,
                ':experience' => $_POST['experience'] ?? null,
                ':additional_info' => $_POST['additionalInformation'] ?? null,
                ':file_path' => $attachmentFile ?? null,
                ':privacypolicy' => isset($_POST['privacypolicy']) ? 1 : 0,
                ':created_at' => $dated
            ]);
        }

        $db->commit();

        $status = 1;
        $message = "Application submitted successfully.";
    }
} catch (Exception $e) {
    $db->rollBack();
    $message = "Failed to submit application.";
    $response[] = ["id" => "general", "message" => $e->getMessage()];
}

echo json_encode([
    "status" => $status,
    "message" => $message,
    "response" => $response,
    "redirect_to" => $redirect_to
]);
