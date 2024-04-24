<?php

spl_autoload_register(function ($className) {
    $path = './src/';
    include $path.$className . '.php'; 
});
