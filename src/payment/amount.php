<?php

if (!function_exists('amount_parse')) {

    /**
     * Возвращает сумму платежа полученную из строкового представления.
     *
     * @param  string $value Строковое представление суммы.
     * @return float
     */
    function amount_parse($value) {
        $amount = strtr($value, [ ' ' => '', ',' => '.' ]);
        $amount = round(floatval($amount), 2);

        return $amount;
    }
}

if (!function_exists('amount_kopecks')) {

    /**
     * Возвращает сумму платежа в копейках.
     *
     * @param  float $amount Сумма платежа.
     * @return int
     */
    function amount_kopecks($amount) {
        return (int)($amount * 100);
    }
}

if (!function_exists('amount_rubles')) {

    /**
     * Возвращает сумму платежа в рублях.
     *
     * @param  int $amount Сумма платежа (в копейках).
     * @return float
     */
    function amount_rubles($amount) {
        if (is_float($amount))
            return $amount;

        return round($amount / 100, 2);
    }
}

if (!function_exists('amount_total')) {

    /**
     * Вычисляет общую сумму.
     *
     * @param  float ...$amounts Список сумм.
     * @return float
     */
    function amount_total(...$amounts) {
        return round(array_sum($amounts), 2);
    }
}

if (!function_exists('amount_commission')) {

    /**
     * Возвращает сумму комиссии.
     *
     * @param  float $amount Сумма платежа.
     * @return float
     */
    function amount_commission($amount, $multiplier, $min = 0) {
        $commission = amount_kopecks($amount) * $multiplier;
        $commission = ($commission < amount_kopecks($min))
            ? amount_kopecks($min)
            : $commission;

        return amount_rubles($commission);
    }
}

if (!function_exists('amount_formatted')) {

    /**
     * Форматирует и возвращает строковое представление суммы платежа.
     *
     * Допустимые параметры:
     * <pre>
     * "abs"      - Преобразование суммы в абсолютное значение. Тип: Boolean.
     * "currency" - Символ валюты. Тип: String.
     * </pre>
     *
     * @param  float $value   Сумма платежа.
     * @param  array $options Параметры форматирования.
     * @return string
     */
    function amount_formatted($value, $options = []) {
        $default = array_replace([
            'absolute' => false,
            'currency' => false
        ], $options);

        $amount = ($default['absolute']) ? abs($value) : $value;
        $amount = number_format($amount, 2, '.', ' ');
        $amount = $amount . ($default['currency'] ?? '');

        return $amount;
    }
}
