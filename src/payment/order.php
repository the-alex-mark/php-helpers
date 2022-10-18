<?php

if (!function_exists('gen_order_id')) {

    /**
     * Формирует уникальный номер операции.
     *
     * @param  string $key Дополнительный ключ уникальности номера операции.
     * @return string
     */
    function gen_order_id($key) {
        return date("Ymd-His") . '-' . $key . '-' . uniqid();
    }
}
