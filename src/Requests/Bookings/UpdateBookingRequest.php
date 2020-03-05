<?php

namespace Mobian\ResellerApi\Requests\Bookings;

use Mobian\ResellerApi\Requests\AbstractRequest;

class UpdateBookingRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_PUT;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/bookings/%d';

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
