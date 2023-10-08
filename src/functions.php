<?php

use Pajaeu\Session\Flash;

if (!function_exists('flash')) {
    function flash(string $type, string $message): void
    {
        Flash::set($type, $message);
    }
}

if (!function_exists('get_flashes')) {
    function get_flashes(): array
    {
        return Flash::get();
    }
}