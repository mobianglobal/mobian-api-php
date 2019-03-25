<?php

namespace Mobian\ResellerApi\Requests\Bookings\Amend\Transactions;

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
    protected $endpoint = '/bookings/%d/amend/transactions';

    /**
     * Constructor.
     *
     * @param int $identifier
     * @param array $contents
     */
    public function __construct($identifier, array $contents)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);

        // TODO: Implement content validation
        $this->contents = $contents;
    }
}
