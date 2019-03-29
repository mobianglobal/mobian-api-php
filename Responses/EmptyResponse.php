<?php

namespace Mobian\ResellerApi\Responses;

class EmptyResponse extends AbstractResponse
{
    /**
     * Constructor.
     *
     * @param int $statusCode
     */
    public function __construct($statusCode = 204)
    {
        $this->statusCode = $statusCode;
    }
}
