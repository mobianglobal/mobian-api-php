<?php

namespace Mobian\ResellerApi\Requests;

abstract class AbstractRequest
{
    /**
     * Delete method HTTP verb.
     *
     * @var string
     */
    public const METHOD_DELETE = 'delete';

    /**
     * Read method HTTP verb.
     *
     * @var string
     */
    public const METHOD_GET = 'get';

    /**
     * Create method HTTP verb.
     *
     * @var string
     */
    public const METHOD_POST = 'post';

    /**
     * Update method HTTP verb.
     *
     * @var string
     */
    public const METHOD_PUT = 'put';

    /**
     * Update method HTTP verb.
     *
     * @var string
     */
    protected $method = self::METHOD_GET;

    /**
     * Endpoint to use for the request.
     *
     * @var string
     */
    protected $endpoint = '/check';

    /**
     * Query parameter collection.
     *
     * @var array
     */
    protected $params;

    /**
     * Content collection.
     *
     * @var array
     */
    protected $contents;

    /**
     * Retrieve the endpoint.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Retrieve the current HTTP method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Verifies whether the request has any set params.
     *
     * @return bool
     */
    public function hasParams()
    {
        return $this->params && count($this->params);
    }

    /**
     * Get the current parameters.
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Verifies whether the request has any set contents.
     *
     * @return bool
     */
    public function hasContents()
    {
        return $this->contents && count($this->contents);
    }

    /**
     * Get the current contents.
     *
     * @return array
     */
    public function getContents()
    {
        return $this->contents;
    }
}
