<?php
session_start();
if ( !isset( $_SESSION[ 'SESS_ADMINID' ] ) || ( trim( $_SESSION[ 'SESS_ADMINID' ] ) == '' ) ) {
	?> <script> window.location.href = window.location.origin + '/manage/logout.php'; </script> <?php
}