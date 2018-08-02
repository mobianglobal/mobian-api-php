<?php

namespace Mobian\ResellerApi;

use Mobian\ResellerApi\Adapters\CurlAdapter;
use Mobian\ResellerApi\Exceptions\Adapters\FormatException;
use Mobian\ResellerApi\Requests\AbstractRequest;

/**
 * MOBIAN communication client.
 */
class ApiClient
{
    /**
     * Execute a request to the API.
     *
     * @param AbstractRequest $request
     * @return array
     */
    public static function request(AbstractRequest $request)
    {
        $response = CurlAdapter::getInstance()->execute($request);

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new FormatException('Looks like our servers are talking jibber-jabber');
        }

        return $result;
    }
}
