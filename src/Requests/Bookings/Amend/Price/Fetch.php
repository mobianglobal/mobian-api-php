<?php

namespace Mobian\ResellerApi\Requests\Bookings\Amend\Price;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Fetch extends AbstractRequest
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
    public function __construct($identifier, array $query = [])
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);

        $this->params = $query;
    }
}
