<?php

namespace Mobian\ApiClient;

class MobianApiConfig
{
    /**
     * Version number of the API package.
     *
     * @var string
     */
    public const VERSION = '1.1.0';

    /**
     * API default hostname.
     *
     * @var string
     */
    public const DEFAULT_HOST_NAME = 'https://api.mobian.global';

    /**
     * API default language.
     *
     * @var string
     */
    public const DEFAULT_LANGUAGE = 'en';

    /**
     * Authentication key.
     *
     * @var string
     */
    private static $authKey;

    /**
     * Requested currency.
     *
     * @var string
     */
    private static $currency;

    /**
     * Custom headers.
     *
     * @var array
     */
    private static $customHeaders = [];

    /**
     * Host where the MOBIAN API is located.
     *
     * @var string
     */
    private static $hostname = self::DEFAULT_HOST_NAME;

    /**
     * Requested language.
     *
     * @var string
     */
    private static $language = self::DEFAULT_LANGUAGE;

    /**
     * Set the auth key for future requests.
     *
     * @param string $authKey
     */
    public static function setAuthKey(string $authKey)
    {
        self::$authKey = $authKey;
    }

    /**
     * Get the current auth key.
     *
     * @return string
     */
    public static function getAuthKey()
    {
        return self::$authKey;
    }

    /**
     * Set the currency for future requests.
     *
     * @param string $currency
     */
    public static function setCurrency($currency)
    {
        self::$currency = $currency;
    }

    /**
     * Get the current currency.
     *
     * @return string
     */
    public static function getCurrency()
    {
        return self::$currency;
    }

    /**
     * Set the custom headers for future requests.
     *
     * @param array $headers
     */
    public static function setCustomHeaders(array $headers)
    {
        self::$customHeaders = $headers;
    }

    /**
     * Get the custom headers.
     *
     * @return array
     */
    public static function getCustomHeaders()
    {
        return self::$customHeaders;
    }

    /**
     * Set the hostname for future requests.
     *
     * @param string $hostname
     */
    public static function setHostname(string $hostname)
    {
        self::$hostname = $hostname;
    }

    /**
     * Get the current hostname.
     *
     * @return string
     */
    public static function getHostname()
    {
        return self::$hostname;
    }

    /**
     * Set the language for any applicable translations.
     *
     * @param string $language
     */
    public static function setLanguage(string $language)
    {
        self::$language = $language;
    }

    /**
     * Get the current requested language.
     *
     * @return string
     */
    public static function getLanguage()
    {
        return self::$language;
    }

    /**
     * Reset the current configuration.
     */
    public static function reset()
    {
        self::$authKey = null;

        self::$currency = null;
        self::$customHeaders = [];
        self::$hostname = self::DEFAULT_HOST_NAME;
        self::$language = self::DEFAULT_LANGUAGE;
    }
}
