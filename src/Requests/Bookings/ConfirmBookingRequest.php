<?php

namespace Mobian\ApiClient\Requests\Bookings;

use Mobian\ApiClient\Requests\AbstractRequest;

class ConfirmBookingRequest extends AbstractRequest
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
    public function __construct(int $identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
