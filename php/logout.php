<?php

session_start();
session_unset();
session_destroy();
echo"<script>window.open('/Project/index.php','_self')</script>";

?>