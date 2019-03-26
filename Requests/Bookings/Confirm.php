<?php

namespace Mobian\ResellerApi\Requests\Bookings;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Confirm extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_POST;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/bookings/%d/confirm';

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
