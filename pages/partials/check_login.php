<?php

function login_or_register_html()
{
    if (isset($_GET['check'])) {
        echo "<div class='text-center'><h1>Моля, влезте в профила си, за да играете.</h1></div>";
    }
    if (isset($_GET['logged'])) {
        echo "<div class='text-center'><h1>Успешен вход.</h1></div>";
    }
}