<?php

namespace Mobian\ResellerApi\Requests\Config;

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
    protected $endpoint = '/config';
}
