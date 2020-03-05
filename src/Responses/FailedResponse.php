<?php

namespace Mobian\ApiClient\Responses;

class FailedResponse extends AbstractResponse
{
    /**
     * Constructor.
     *
     * @param string $response
     */
    public function __construct(string $response)
    {
        parent::__construct($response, 'text/plain', 0);
    }

    /**
     * @inheritdoc
     */
    public function isErroneous()
    {
        return true;
    }
}
