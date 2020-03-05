<?php

namespace Mobian\ApiClient\Requests\Config;

use Mobian\ApiClient\Requests\AbstractRequest;

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
