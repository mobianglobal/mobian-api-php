<?php

namespace Mobian\ResellerApi\Responses;

class JsonResponse extends AbstractResponse
{
    /**
     * JSON response of the request.
     *
     * @var array
     */
    protected $response;

    /**
     * @inheritdoc
     *
     * @return array
     */
    public function getResponse()
    {
        return parent::getResponse();
    }
}
