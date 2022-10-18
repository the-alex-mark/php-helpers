<?php

if (!function_exists('get_client_ip')) {

    /**
     * Возвращает адрес IP клиента.
     *
     * @return string
     */
    function get_client_ip () {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_REAL_IP']))
            return $_SERVER['HTTP_X_REAL_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        if (!empty($_SERVER['REMOTE_ADDR']))
            return $_SERVER['REMOTE_ADDR'];

        return '0.0.0.0';
    }
}

if (!function_exists('get_client_session')) {

    /**
     * Возвращает идентификатор сессии клиента.
     *
     * @return string
     */
    function get_client_session () {
        return session_id();
    }
}

if (!function_exists('get_client_agent')) {

    /**
     * Возвращает ...
     *
     * @return string
     */
    function get_client_agent () {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }
}
