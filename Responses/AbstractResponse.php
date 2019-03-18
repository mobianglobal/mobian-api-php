<?php

namespace Mobian\ResellerApi\Responses;

abstract class AbstractResponse
{
    /**
     * Response of a request.
     *
     * @var string
     */
    protected $response;

    /**
     * HTTP status code for the response.
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Constructor.
     *
     * @param string $response
     * @param int $statusCode
     */
    public function __construct($response, $statusCode = 200)
    {
        $this->response = $response;
        $this->statusCode = $statusCode;
    }

    /**
     * Get the response.
     *
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get the response status code.
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get the status level of the response status code.
     *
     * @return int
     */
    public function getStatusLevel()
    {
        return (int) floor($this->statusCode / 100);
    }

    /**
     * Check whether the status code insinuates a client error.
     *
     * @return bool
     */
    public function isClientError()
    {
        return $this->getStatusLevel() === 4;
    }

    /**
     * Check whether the status code insinuates a service error.
     *
     * @return bool
     */
    public function isServerError()
    {
        return $this->getStatusLevel() === 5;
    }

    /**
     * Check whether the response is a teapot.
     *
     * @return bool
     */
    public function isTeapot()
    {
        return $this->getStatusCode() === 418;
    }
}
