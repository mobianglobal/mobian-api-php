<?php

namespace Mobian\ResellerApi\Factories;

use Mobian\ResellerApi\Exceptions\FormatException;
use Mobian\ResellerApi\Responses\AbstractResponse;
use Mobian\ResellerApi\Responses\EmptyResponse;
use Mobian\ResellerApi\Responses\FailedResponse;
use Mobian\ResellerApi\Responses\JsonResponse;
use Mobian\ResellerApi\Responses\PlainTextResponse;

class ResponseFactory
{
    /**
     * Creates the appropriate response class for the response.
     *
     * @param string $response
     * @param string $contentType
     * @param int $statusCode
     *
     * @throws FormatException
     *
     * @return AbstractResponse
     */
    public static function make(string $response, string $contentType, int $statusCode)
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
