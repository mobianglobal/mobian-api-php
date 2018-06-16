<?php

namespace Mobian\ResellerApi\Requests\Products;

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
    protected $endpoint = '/v1/resource2/product_listing.travel/data';

    /**
     * Contructor.
     *
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        // TODO: Implement query parsing
        $this->params = $query;
    }
}
