<?php

use PSkordilakis\BladeClassDirective\ClassNames;

if (!function_exists('classNames')) {
    function classNames (...$classes) {
        $classNames = new ClassNames();

        return $classNames(...$classes);
    }
}