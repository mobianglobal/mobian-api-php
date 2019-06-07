<?php

namespace Mobian\ResellerApi;

/**
 * Static configuration class.
 */
class ApiConfig
{
    /**
     * Version number of the API package.
     *
     * @var string
     */
    const VERSION = '0.7.2';

    /**
     * API authentication identifier.
     *
     * @var string
     */
    const DEFAULT_AUTH_IDENTIFIER = 'Api-Key';

    /**
     * API default hostname.
     *
     * @var string
     */
    const DEFAULT_HOST_NAME = 'https://api-v3.mobian.global';

    /**
     * API default language.
     *
     * @var string
     */
    const DEFAULT_LANGUAGE = 'en';

    /**
     * Host where the MOBIAN API is located.
     *
     * @var string
     */
    private static $hostname = self::DEFAULT_HOST_NAME;

    /**
     * Authentication identifier.
     *
     * @var string
     */
    private static $authIdentifier = self::DEFAULT_AUTH_IDENTIFIER;

    /**
     * Authentication key.
     *
     * @var string
     */
    private static $authKey;

    /**
     * Requested language.
     *
     * @var string
     */
    private static $language = self::DEFAULT_LANGUAGE;

    /**
     * Set the hostname for future requests.
     *
     * @param string $hostname
     */
    public static function setHostname($hostname)
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
     * Set the auth identifier for future requests.
     *
     * @param string $authIdentifier
     */
    public static function setAuthIdentifier($authIdentifier)
    {
        self::$authIdentifier = $authIdentifier;
    }

    /**
     * Get the current auth identifier.
     *
     * @return string
     */
    public static function getAuthIdentifier()
    {
        return self::$authIdentifier;
    }

    /**
     * Set the auth key for future requests.
     *
     * @param string $authKey
     */
    public static function setAuthKey($authKey)
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
     * Set the language for any applicable translations.
     *
     * @param string $language
     */
    public static function setLanguage($language)
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

        self::$authIdentifier = self::DEFAULT_AUTH_IDENTIFIER;
        self::$hostname = self::DEFAULT_HOST_NAME;
        self::$language = self::DEFAULT_LANGUAGE;
    }
}
