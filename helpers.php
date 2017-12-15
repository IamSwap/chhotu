<?php

// Global Functions

// Renders views from /app/views directory
function view($file, $data) 
{
    extract($data);
    require_once './app/views/' . $file . '.php';
}
