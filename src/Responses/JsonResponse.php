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
     * @param string $contentType
     * @param int $statusCode
     */
    public function __construct(array $response, string $contentType, int $statusCode = 200)
    {
        $this->contentType = $contentType;
        $this->response = $response;
        $this->statusCode = $statusCode;
    }

    /**
     * @inheritdoc
     *
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }
}
