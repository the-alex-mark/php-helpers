<?php

if (!function_exists('is_boolean')) {

    /**
     * Определяет, является ли указанное значение логическим.
     *
     * @param  mixed $value
     * @return bool
     */
    function is_boolean($value) {
        if (is_bool($value) || in_array(mb_strtolower($value), [ true, false, 'true', 'false', 0, 1, '0', '1', 'on', 'off', 'yes', 'no', 'not', 'да', 'нет' ], true))
            return true;

        return false;
    }
}

if (!function_exists('is_true')) {

    /**
     * Определяет, является ли указанное значение истинным.
     *
     * @param  mixed $value
     * @return bool
     */
    function is_true($value) {
        if (in_array(mb_strtolower($value), [ 'yes', 'on', 'да', '1', 1, true, 'true' ], true))
            return true;

        return false;
    }
}
