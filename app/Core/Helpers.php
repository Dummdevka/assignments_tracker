<?php

function run_404($message='Not found') {
    // Code for 404.
    header('HTTP/1.0 404 Not Found');
    require_once TEMPLATEDIR . '404.php';
}
