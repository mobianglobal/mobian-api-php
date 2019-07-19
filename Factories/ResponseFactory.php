<?php

namespace Mobian\ResellerApi\Factories;

use Mobian\ResellerApi\Exceptions\FormatException;
use Mobian\ResellerApi\Responses\AbstractResponse;
use Mobian\ResellerApi\Responses\EmptyResponse;
use Mobian\ResellerApi\Responses\JsonResponse;
use Mobian\ResellerApi\Responses\PlainTextResponse;

class ResponseFactory
{
    /**
     * Creates the appropriate response class for the response.
     *
     * @param string $response
     * @param string $contentType
     * @param int $code
     *
     * @throws FormatException
     *
     * @return AbstractResponse
     */
    public static function make($response, $contentType, $code)
    {
        if (empty($response)) {
            return new EmptyResponse($code);
        }

        if ($contentType === 'application/json') {
            $decodedResponse = json_decode($response, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new FormatException('Looks like our servers are talking jibber-jabber');
            }

            return new JsonResponse($decodedResponse, $contentType, $code);
        }

        return new PlainTextResponse($response, $contentType, $code);
    }
}
