<?php

namespace Mobian\ResellerApi\Requests\Categories;

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
    protected $endpoint = '/categories';

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
