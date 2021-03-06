<?php

namespace Mobian\ApiClient\Requests\Bookings;

use Mobian\ApiClient\Requests\AbstractRequest;

class CancelBookingRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_PUT;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/bookings/%d/cancel';

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
