<?php

namespace MobianApi;

use Exception;
use MobianApi\Adapters\Curl;
use MobianApi\Requests\AbstractRequest;

/**
 * MOBIAN communication client.
 */
class MobianClient
{
    /**
     * Execute a request to the API.
     *
     * @param AbstractRequest $request
     * @return array
     */
    public static function request(AbstractRequest $request)
    {
        $response = Curl::getInstance()->execute($request);

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Looks like our servers are talking jibber-jabber');
        }

        return $result;
    }
}
