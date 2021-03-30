<?php
session_start();
session_destroy();
header('Location: http://localhost/kursove/IT-Village/index.php');