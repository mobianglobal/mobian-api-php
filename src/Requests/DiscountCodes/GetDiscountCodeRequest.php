<?php

namespace Mobian\ApiClient\Requests\DiscountCodes;

use Mobian\ApiClient\Requests\AbstractRequest;

class GetDiscountCodeRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/discount-codes/code/%s';

    /**
     * Constructor.
     *
     * @param string $discountCode
     */
    public function __construct(string $discountCode)
    {
        $this->endpoint = sprintf($this->endpoint, $discountCode);
    }
}
