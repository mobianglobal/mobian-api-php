<?php

namespace Mobian\ResellerApi\Requests\Bookings;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Update extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_PUT;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/bookings/%s';

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
