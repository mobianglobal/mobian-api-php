<?php

namespace Mobian\ResellerApi\Requests\Transactions\Quotes;

use Mobian\ResellerApi\Requests\AbstractRequest;

class GetTransactionQuotesRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/transactions/%d/quotes';

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
