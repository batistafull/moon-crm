<?php

include __DIR__ . "/header.php";
include __DIR__ . "/navbar.php";

if (isset($viewPath) && file_exists($viewPath)) {
    include $viewPath;
} else {
    echo "Error: La vista no existe.";
}

include __DIR__ . "/footer.php";
