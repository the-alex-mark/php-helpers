<?php

if (!function_exists('env_separator')) {

    /**
     * Возвращает значение переменной среды.
     * <br>
     * Формирует массив, преобразованный из строки с указанным форматом разделителя.
     *
     * @param  string $key
     * @param  string $pattern
     * @return array
     */
    function env_separator($key, $pattern = '/,(\s+)?/') {
        return array_map('trim', preg_split($pattern, env($key, '')));
    }
}
