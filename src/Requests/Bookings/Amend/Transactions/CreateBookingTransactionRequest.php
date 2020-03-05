<?php

namespace Mobian\ApiClient\Requests\Bookings\Amend\Transactions;

use Mobian\ApiClient\Requests\AbstractRequest;

class CreateBookingTransactionRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_POST;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/bookings/%d/amend/transactions';

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
