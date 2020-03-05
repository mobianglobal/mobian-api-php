<?php

namespace Mobian\ResellerApi\Requests\Bookings;

use Mobian\ResellerApi\Requests\AbstractRequest;

class CreateBookingRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_POST;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/bookings';

    /**
     * Constructor.
     *
     * @param array $contents
     */
    public function __construct(array $contents)
    {
        // TODO: Implement content validation
        $this->contents = $contents;
    }
}
