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

if (!function_exists('parse_arguments')) {

    /**
     * Возвращает массив, объединяя элементы первого со значениями по умолчанию.
     * <br>
     * Параметры можно указать строкой.
     *
     * @param  array|string $args
     * @param  array        $defaults
     * @return array
     */
    function parse_arguments($args, $defaults = []) {
        if (is_object($args)) {
            $parsed_args = get_object_vars($args);
        } elseif (is_array($args)) {
            $parsed_args =& $args;
        } else {
            parse_str($args, $parsed_args);
        }

        if (is_array($defaults) && $defaults)
            return array_merge($defaults, $parsed_args);

        return $parsed_args;
    }
}

if (!function_exists('mb_ucfirst') && extension_loaded('mbstring')) {

    /**
     * Преобразует первый символ строки заглавным.
     *
     * @param  string $value
     * @param  string $encoding
     * @return string
     */
    function mb_ucfirst($value, $encoding = 'utf-8') {
        $first    = mb_substr($value, 0, 1, $encoding);
        $then     = mb_substr($value, 1, null, $encoding);
        $result   = mb_strtoupper($first, $encoding) . $then;

        return $result;
    }
}

if (!function_exists('mb_ucwords') && extension_loaded('mbstring')) {

    /**
     * Преобразует первый символ каждого слова строки заглавным.
     *
     * @param  string $value
     * @param  string $encoding
     * @return string
     */
    function mb_ucwords($value, $encoding = 'utf-8') {
        return mb_convert_case($value, MB_CASE_TITLE, $encoding);
    }
}
