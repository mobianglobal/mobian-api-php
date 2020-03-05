<?php

namespace Mobian\ResellerApi\Requests\Transactions;

use Mobian\ResellerApi\Requests\AbstractRequest;

class GetTransactionRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/transactions/%d';

    /**
     * Constructor.
     *
     * @param int $identifier
     */
    public function __construct(int $identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
