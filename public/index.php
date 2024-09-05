<?php

if (!session_id()) { // menjalankan session dari awal untuk flasher
    session_start();
}

require_once '../app/init.php';

$app = new App;
