<?php

namespace Mobian\ApiClient\Factories;

use Mobian\ApiClient\Exceptions\FormatException;
use Mobian\ApiClient\Responses\AbstractResponse;
use Mobian\ApiClient\Responses\EmptyResponse;
use Mobian\ApiClient\Responses\FailedResponse;
use Mobian\ApiClient\Responses\JsonResponse;
use Mobian\ApiClient\Responses\PlainTextResponse;

class ResponseFactory
{
    /**
     * Creates the appropriate response class for the response.
     *
     * @param string $response
     * @param int $statusCode
     * @param string $contentType
     *
     * @throws FormatException
     *
     * @return AbstractResponse
     */
    public static function make(string $response, int $statusCode, string $contentType = null)
    {
        if (empty($response)) {
            return new EmptyResponse($statusCode);
        }

        if ($contentType === 'application/json') {
            $decodedResponse = json_decode($response, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new FormatException('Looks like our servers are talking jibber-jabber');
            }

            return new JsonResponse($decodedResponse, $contentType, $statusCode);
        }

        return new PlainTextResponse($response, $contentType, $statusCode);
    }

    /**
     * Creates a FailedResponse object.
     *
     * @param string $message
     *
     * @return FailedResponse
     */
    public static function makeFailed(string $message)
    {
        return new FailedResponse($message);
    }
}
