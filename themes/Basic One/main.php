<?php

include __DIR__ . "/header.php";
if(isset($_GET['module']) && $_GET['module'] != strtolower('login')) {
    include __DIR__ . "/navbar.php";
}

if (isset($viewPath) && file_exists($viewPath)) {
    include $viewPath;
} else {
    echo "Error: La vista no existe.";
}

include __DIR__ . "/footer.php";
