<?php

namespace Mobian\ResellerApi;

use Mobian\ResellerApi\Adapters\CurlAdapter;
use Mobian\ResellerApi\Exceptions\Adapters\ClientException;
use Mobian\ResellerApi\Exceptions\Adapters\FormatException;
use Mobian\ResellerApi\Exceptions\Adapters\ServerException;
use Mobian\ResellerApi\Requests\AbstractRequest;
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
     * @return JsonResponse
     *
     * @throws ClientException
     * @throws FormatException
     * @throws ServerException
     */
    public static function request(AbstractRequest $request)
    {
        $response = CurlAdapter::getInstance()->execute($request);

        $decodedResponse = json_decode($response->getResponse(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new FormatException('Looks like our servers are talking jibber-jabber');
        }

        // Validate the response's status code
        if ($response->isClientError()) {
            // There is something wrong on the input side
            throw new ClientException($decodedResponse['message'], $decodedResponse['code']);
        } elseif ($response->isServerError()) {
            // There is something wrong on the server side
            throw new ServerException($decodedResponse['message'], $decodedResponse['code']);
        }

        return new JsonResponse($decodedResponse, $response->getStatusCode());
    }
}
