<?php

namespace Mobian\ResellerApi\Requests\Config;

use Mobian\ResellerApi\Requests\AbstractRequest;

class GetConfigRequest extends AbstractRequest
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
