<?php

namespace Mobian\ApiClient\Requests\Transactions\Payments;

use Mobian\ApiClient\Requests\AbstractRequest;

class CreateTransactionPayment extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_POST;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/transactions/%d/payments';

    /**
     * Constructor.
     *
     * @param int $identifier
     * @param array $contents
     */
    public function __construct(int $identifier, array $contents)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);

        // TODO: Implement content validation
        $this->contents = $contents;
    }
}
