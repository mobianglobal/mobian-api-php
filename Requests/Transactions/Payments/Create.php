<?php

namespace Mobian\ResellerApi\Requests\Transactions\Payments;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Create extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_POST;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/transactions/%d/payments';

    /**
     * Constructor.
     *
     * @param mixed $identifier
     * @param array $contents
     */
    public function __construct($identifier, array $contents)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);

        // TODO: Implement content validation
        $this->contents = $contents;
    }
}
