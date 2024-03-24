<?php

function home_url($path): string
{
    return APP_PATH . '/' . $path;
}

function isCurrentUrl($path): bool
{
    return $_SERVER['REQUEST_URI'] == home_url($path);
}

function assets_url($path): string
{
    return APP_PATH . '/assets/' . $path;
}