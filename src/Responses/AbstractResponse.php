<?php

namespace Mobian\ApiClient\Responses;

abstract class AbstractResponse
{
    /**
     * Content type of the response.
     *
     * @var string
     */
    protected $contentType;

    /**
     * The response.
     *
     * @var string
     */
    protected $response;

    /**
     * HTTP status code of the response.
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Constructor.
     *
     * @param string $response
     * @param string $contentType
     * @param int $statusCode
     */
    public function __construct($response, $contentType, $statusCode = 200)
    {
        $this->contentType = $contentType;
        $this->response = $response;
        $this->statusCode = $statusCode;
    }

    /**
     * Get the content type.
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
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
     * Checks whether the response is successful.
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return !$this->isErroneous();
    }

    /**
     * Check whether the response is an error.
     *
     * @return bool
     */
    public function isErroneous()
    {
        return $this->isClientError() || $this->isServerError();
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
