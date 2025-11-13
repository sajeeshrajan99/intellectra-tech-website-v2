<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["username"]) && isset($_POST["username"])) {
		require_once("../include/dbConnect.php");
		require_once("../include/AnythingHelper.php");
		$username = strtolower(trim($_POST["username"]));
		$password = trim($_POST["password"]);
		$remember_token = genToken();

		if ($username == '' || $password == '') {
			echo json_encode(array(
				"status" => 0,
				"message" => 'Please enter sign in credentials'
			));
			exit();
		} else {
			$stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND status = 1 AND password = ? LIMIT 0,1");
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $password);
			$stmt->execute();
			$usercount = $stmt->rowCount();
			if ($usercount > 0) {
				$user_rows = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($password == $user_rows['password']) {
					$usertoken = $user_rows['token'];

					$_SESSION['SESS_ADMINID'] = $user_rows['id'];
					$_SESSION['SESS_ADMINTYP'] = $user_rows['usertype'];
					$_SESSION['SESS_ADMINTOKEN'] = $user_rows['token'];
					$_SESSION['SESS_ADMINNAME'] = $user_rows['name'];
					setcookie("LU001", $remember_token, time() + (10 * 365 * 24 * 60 * 60), '/');

					$db->prepare("UPDATE users SET remember_token = '$remember_token' WHERE  token = '$usertoken'")->execute();

					echo json_encode(array(
						"status" => 1,
						"message" => 'Sign in Success'
					));
					exit();
				} else {
					echo json_encode(array(
						"status" => 0,
						"message" => 'Invalid sign in credentials'
					));
					exit();
				}
			} else {
				echo json_encode(array(
					"status" => 0,
					"message" => 'Invalid sign in credentials'
				));
				exit();
			}
		}
	} else {
		echo json_encode(array(
			"status" => 0,
			"message" => 'Unauthorized action.'
		));
		exit();
	}
} else {
	echo json_encode(array(
		"status" => 0,
		"message" => 'Unauthorized action.'
	));
	exit();
}
