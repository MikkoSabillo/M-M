<?php
session_start();
session_destroy();
header("Location: ../index.php");
exit(); // 🚪 Always exit after a header redirect
?>