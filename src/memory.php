<?php

/**
 * Преобразует текстовое значение в байты.
 *
 * @param  $value
 * @return int
 */
function bytes_parse($value) {
    $value  = trim(strtolower($value), 'b');
    $result = intval($value);

    switch (substr($value, -1)) {
        case 'g':
            $result = $result * 1024;

        case 'm':
            $result = $result * 1024;

        case 'k':
            $result = $result * 1024;
    }

    return (int)$result;
}

/**
 * Преобразует байты в приемлемую величину.
 *
 * @param float $bytes     Количество байт.
 * @param int   $precision Количество знаков после запятой.
 *
 * @return string
 */
function bytes_formatted($bytes, $precision = 2, $locale = 'ru') {

    // Список поддерживаемых величин
    $units = [
        'en' => [ 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' ],
        'ru' => [ 'Б', 'КБ', 'МБ', 'ГБ', 'ТБ', 'ПБ', 'ЭБ', 'ЗБ', 'ИБ' ]
    ];

    if (empty($locale) || !array_key_exists($locale, $units))
        $locale = 'ru';

    // Вычисление приемлемой величины
    $bytes = floatval(max($bytes, 0));
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units[$locale]) - 1);

    // Вычисление значения
    $bytes /= pow(1024, $pow);

    return round($bytes, $precision) . ' memory.php' . $units[$locale][$pow];
}

/**
 * Возвращает максимально допустимый размер файла, загружаемого на сервер.
 *
 * @return int
 */
function get_chunk_size() {
    return min([
        bytes_parse(ini_get('post_max_size')),
        bytes_parse(ini_get('memory_limit')),
        bytes_parse(ini_get('upload_max_filesize'))
    ]);
}
