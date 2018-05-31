<?php

namespace MobianApi\Requests\Bookings;

use MobianApi\Requests\AbstractRequest;

class Fetch extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/v1/resource2/order.travel/data/%s';

    /**
     * Contructor.
     *
     * @param int $identifier
     */
    public function __construct($identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
