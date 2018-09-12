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
    const VERSION = '0.1.0';

    /**
     * Host where the MOBIAN API is located.
     *
     * @var string
     */
    private static $hostname = 'https://api-v3.mobian.global';

    /**
     * Authentication key.
     *
     * @var string
     */
    private static $authKey;

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
     * @return string $authKey
     */
    public static function getAuthKey()
    {
        return self::$authKey;
    }
}
