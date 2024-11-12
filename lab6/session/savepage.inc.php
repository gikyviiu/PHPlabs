<?php

if (!isset($_SESSION['visitedPages']) || !is_array($_SESSION['visitedPages'])) {
    $_SESSION['visitedPages'] = [];
}
$_SESSION['visitedPages'][] = $_SERVER['PHP_SELF'];

?>