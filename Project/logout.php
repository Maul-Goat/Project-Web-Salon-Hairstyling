<?php
session_start();
session_destroy();
header("Location: index.php?message=Anda telah logout!");
?>