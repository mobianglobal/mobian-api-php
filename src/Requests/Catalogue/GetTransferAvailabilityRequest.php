<?php

namespace Mobian\ApiClient\Requests\Catalogue;

use Mobian\ApiClient\Requests\AbstractRequest;

class GetTransferAvailabilityRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/catalogue/transfer';

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
