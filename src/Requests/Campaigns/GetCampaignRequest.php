<?php

namespace Mobian\ApiClient\Requests\Campaigns;

use Mobian\ApiClient\Requests\AbstractRequest;

class GetCampaignRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected $method = self::METHOD_GET;

    /**
     * @inheritdoc
     */
    protected $endpoint = '/api/funnels/%d';

    /**
     * Constructor.
     *
     * @param int $identifier
     */
    public function __construct(int $identifier)
    {
        $this->endpoint = sprintf($this->endpoint, $identifier);
    }
}
