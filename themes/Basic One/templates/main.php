<?php

echo $header;
if (!isset($_GET['module']) || strtolower($_GET['module']) !== 'login') {
    echo $navbar;
}

echo $content;

echo $footer;
