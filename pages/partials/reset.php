<?php

session_start();
session_destroy();

header('Location: ./../play.php');