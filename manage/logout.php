<?php
session_start();
unset($_SESSION[ 'SESS_ADMINID' ]);
unset($_SESSION[ 'SESS_ADMINTYP' ]);
unset($_SESSION[ 'SESS_ADMINTOKEN' ]);
unset($_SESSION[ 'SESS_ADMINNAME' ]);
setcookie('LU001', "", -1, '/');
?>
<script> window.location.href = window.location.origin + '/manage/'; </script>