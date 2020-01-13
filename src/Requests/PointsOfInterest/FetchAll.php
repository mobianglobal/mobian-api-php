<?php

namespace Mobian\ResellerApi\Requests\PointsOfInterest;

use Mobian\ResellerApi\Requests\AbstractRequest;

class FetchAll extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/points-of-interest';

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
