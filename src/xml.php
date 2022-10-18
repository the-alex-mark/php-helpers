<?php

if (!function_exists('xml_pretty')) {

    /**
     * Форматирует строку формата XML в читабельный вид.
     *
     * @param  string $value Строка в формате XML.
     * @return false|string
     */
    function xml_pretty($value) {
        $dom = new DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($value);

        return $dom->saveXML();
    }
}
