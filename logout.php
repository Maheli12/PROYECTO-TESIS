<?php

ob_start();
session_start();
unset($_SESSION['rainbow_nombre']);
unset($_SESSION['rainbow_uid']);
unset($_SESSION['rainbow_nombre_usuario']);
echo '<script type="text/javascript">window.location="login.php"; </script>';


?>