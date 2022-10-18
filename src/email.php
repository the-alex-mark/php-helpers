<?php

if (!function_exists('is_email')) {

    /**
     * Проверяет, является ли данное значение валидным адресом электронной почты.
     *
     * @param  string $email Адрес электронной почты.
     * @return bool
     */
    function is_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

if (!function_exists('email_masked')) {

    /**
     * Маскирует адрес электронной почты.
     *
     * @param  string $email   Адрес электронной почты.
     * @param  string $pattern Маскировочный символ.
     * @return string
     */
    function email_masked($email, $pattern = '*') {
        if (is_email($email)) {
            list($first, $last) = explode('@', $email);
            $first = str_replace(substr($first, '3'), str_repeat($pattern, strlen($first) - 3), $first);
            $last = explode('.', $last);
            $last_domain = str_replace(substr($last['0'], '1'), str_repeat($pattern, strlen($last['0']) - 1), $last['0']);
            $hideEmailAddress = $first . '@' . $last_domain . '.' . $last['1'];

            return $hideEmailAddress;
        }

        return $email;
    }
}
