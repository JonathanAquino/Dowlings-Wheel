<?php
if ($_GET['enabled'] == 'true') {
    setcookie('strict_mode', 'on', time() + (86400 * 365), "/");
    echo 'Strict mode enabled';
} else {
    setcookie('strict_mode', null, -1, '/');
    echo 'Strict mode disabled';
}

