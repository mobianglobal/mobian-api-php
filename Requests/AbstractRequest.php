<?php

namespace MobianApi\Requests;

abstract class AbstractRequest
{
    /**
     * Delete method HTTP verb.
     *
     * @var string
     */
    const METHOD_DELETE = 'delete';

    /**
     * Read method HTTP verb.
     *
     * @var string
     */
    const METHOD_GET = 'get';

    /**
     * Create method HTTP verb.
     *
     * @var string
     */
    const METHOD_POST = 'post';

    /**
     * Update method HTTP verb.
     *
     * @var string
     */
    const METHOD_PUT = 'put';

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
    protected $endpoint = '/hb';

    /**
     * Parameter collection.
     *
     * @var array
     */
    protected $params;

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
     * Get the current parameters.
     *
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }
}
