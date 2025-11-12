<?php
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

session_start();
unset(\['autenticado']);
unset(\['usuario']);
session_destroy();

header("Location: ../index.php");
exit();
?>
