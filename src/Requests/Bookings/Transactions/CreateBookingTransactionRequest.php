<?php

namespace Mobian\ResellerApi\Requests\Bookings\Transactions;

use Mobian\ResellerApi\Requests\AbstractRequest;

class CreateBookingTransactionRequest extends AbstractRequest
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
     * @param int $identifier
     */
    public function __construct(int $identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
