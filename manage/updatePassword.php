<?php
session_start();
$responseStatus = 0;
$responseMsg = '';
if ( isset( $_SESSION[ 'SESS_ADMINID' ] ) || ( trim( $_SESSION[ 'SESS_ADMINID' ] ) != '' ) ) {
        require_once("include/dbConnect.php");
        $token = $_SESSION[ 'SESS_ADMINTOKEN' ];
        
        if(trim($_POST['cPassword']) == '' || trim($_POST['nPassword']) == '' || trim($_POST['rPassword']) == ''){
            echo json_encode( array(
                "status" => 0,
                "message" => 'Please fill all required fileds.'
            ) );
            exit();
        } else {
            $stmt = $db->prepare( "SELECT * FROM users WHERE token = ? LIMIT 0,1" );
			$stmt->bindParam( 1, $token );
			$stmt->execute();
			$usercount = $stmt->rowCount();
			if ( $usercount > 0 ) {
                $user_rows = $stmt->fetch( PDO::FETCH_ASSOC );
                if ( trim($_POST['cPassword']) == $user_rows[ 'password' ] ) {
                    if(trim($_POST['nPassword']) == trim($_POST['rPassword']) ){     
                        $nPassword = trim($_POST['nPassword']);       
                        $updateData = $db->prepare( "UPDATE users SET password = :password WHERE token = :token" );
                        $updateData->bindParam( ':password', $nPassword, PDO::PARAM_STR );
                        $updateData->bindParam( ':token', $token, PDO::PARAM_STR );
                        $updateData->execute();
            
                        $responseStatus = 1;
                        $responseMsg = 'Password Updated.';
                    } else {
                        $responseMsg = 'Repeat password is not matching.';
                    }
                } else {
                    $responseMsg = 'Current password is wrong.';
                }
            }
        }
} else {
    $responseMsg = 'Session Expired!';
}
echo json_encode( array(
    "status" => $responseStatus,
    "message" => $responseMsg
) );