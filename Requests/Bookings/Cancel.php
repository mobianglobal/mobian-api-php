<?php

namespace Mobian\ResellerApi\Requests\Bookings;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Cancel extends AbstractRequest
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
    public function __construct($identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
