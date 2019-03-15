<?php

namespace Mobian\ResellerApi\Responses;

class JsonResponse extends AbstractResponse
{
    /**
     * JSON response of the request.
     *
     * @var array
     */
    protected $response;

    /**
     * Constructor.
     *
     * @param array $response
     * @param int $statusCode
     */
    public function __construct(array $response, $statusCode = 200) {
        $this->response = $response;
        $this->statusCode = $statusCode;
    }
}
