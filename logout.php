<?php 
session_start();
session_destroy();
unset($_SESSION);
echo"<script>window.location.href='index.php'</script>";
