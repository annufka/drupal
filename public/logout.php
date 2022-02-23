<?php
    session_status();
    unset($_SESSION['auth']);
    unset($_SESSION['username']);
    session_destroy();
    header('HTTP/1.1 401 Unauthorized', true, 401);
?>