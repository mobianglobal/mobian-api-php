<?php

namespace Mobian\ResellerApi\Requests\Catalogue;

use Mobian\ResellerApi\Requests\AbstractRequest;

class Parking extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/catalogue/parking';

    /**
     * Constructor.
     *
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        // TODO: Implement query parsing
        $this->params = $query;
    }
}
