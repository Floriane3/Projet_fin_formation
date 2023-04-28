<?php

spl_autoload_register(function ($name) {
    $file = "../classes/".strtolower($name).".php";
    // classes/ = le nom du dossier dans lequel se trouvent les classes
    //strtolower = le nom des classes en minuscules, il fut donc changer le nom, des fichiers avec le nom des classes mis en minuscule
    if (file_exists($file)) {
        require_once $file;
    }
});
