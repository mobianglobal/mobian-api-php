<?php

namespace Mobian\ApiClient\Responses;

class EmptyResponse extends AbstractResponse
{
    /**
     * Constructor.
     *
     * @param int $statusCode
     */
    public function __construct(int $statusCode = 204)
    {
        $this->statusCode = $statusCode;
    }
}
