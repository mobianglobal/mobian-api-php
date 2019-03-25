<?php

namespace Mobian\ResellerApi\Requests\Transactions\Quotes;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Fetch extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/transactions/%d/quotes';

    /**
     * Constructor.
     *
     * @param int $identifier
     */
    public function __construct($identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
