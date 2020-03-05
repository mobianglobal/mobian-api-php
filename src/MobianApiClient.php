<?php

namespace Mobian\ApiClient;

use Mobian\ApiClient\Adapters\CurlAdapter;
use Mobian\ApiClient\Exceptions\ClientException;
use Mobian\ApiClient\Exceptions\ServerException;
use Mobian\ApiClient\Requests\AbstractRequest;
use Mobian\ApiClient\Responses\AbstractResponse;
use Mobian\ApiClient\Responses\JsonResponse;

class MobianApiClient
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
        if (empty($requests)) {
            return [];
        }

        return CurlAdapter::getInstance()->execute($requests);
    }
}
