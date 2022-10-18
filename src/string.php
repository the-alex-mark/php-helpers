<?php

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
