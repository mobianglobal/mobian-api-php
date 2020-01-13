<?php

namespace Mobian\ResellerApi\Requests\Bookings\Transactions;

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
    protected $endpoint = '/api/bookings/%d/transactions';

    /**
     * Constructor.
     *
     * @param mixed $identifier
     */
    public function __construct($identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
