<?php

namespace Mobian\ResellerApi\Requests\Bookings;

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
    protected $endpoint = '/v1/resource2/order.travel/data';

    /**
     * Contructor.
     *
     * @param array $contents
     */
    public function __construct(array $contents)
    {
        // TODO: Implement content validation
        $this->contents = $contents;
    }
}
