<?php
    session_start();
    session_unset();
    session_destroy();
    header('HTTP/1.1 401 Unauthorized', true, 401);
?>