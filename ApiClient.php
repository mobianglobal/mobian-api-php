<?php

namespace Mobian\ResellerApi;

use Mobian\ResellerApi\Adapters\CurlAdapter;
use Mobian\ResellerApi\Exceptions\ClientException;
use Mobian\ResellerApi\Exceptions\ServerException;
use Mobian\ResellerApi\Requests\AbstractRequest;
use Mobian\ResellerApi\Responses\AbstractResponse;
use Mobian\ResellerApi\Responses\JsonResponse;

/**
 * MOBIAN communication client.
 */
class ApiClient
{
    /**
     * Execute a request to the API.
     *
     * @param AbstractRequest $request
     *
     * @throws ClientException
     * @throws ServerException
     *
     * @return AbstractResponse
     */
    public static function request(AbstractRequest $request)
    {
        $responses = self::multi([$request]);

        $response = array_shift($responses);

        // Throw client exceptions
        if ($response->isClientError()) {
            $message = $response->getResponse();

            if ($response instanceof JsonResponse) {
                $message = $response->getResponse()['message'];
            }

            throw new ClientException($message, $response->getStatusCode());
        }

        if ($response->isServerError()) {
            $message = $response->getResponse();

            if ($response instanceof JsonResponse) {
                $message = $response->getResponse()['message'];
            }

            throw new ServerException($message, $response->getStatusCode());
        }

        return $response;
    }

    /**
     * Execute multiple requests at the same time to the API.
     *
     * @param AbstractRequest[] $requests
     *
     * @return AbstractResponse[] $request
     */
    public static function multi(array $requests)
    {
        return CurlAdapter::getInstance()->execute($requests);
    }
}
