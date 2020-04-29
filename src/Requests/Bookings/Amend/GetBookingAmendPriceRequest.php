<?php

namespace Mobian\ApiClient\Requests\Bookings\Amend;

use Mobian\ApiClient\Requests\AbstractRequest;

class GetBookingAmendPriceRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/bookings/%d/amend/price';

    /**
     * Constructor.
     *
     * @param int $identifier
     * @param array $query
     */
    public function __construct(int $identifier, array $query = [])
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);

        $this->params = $query;
    }
}
