<?php

namespace Mobian\ResellerApi\Adapters;

use Mobian\ResellerApi\ApiConfig;
use Mobian\ResellerApi\Exceptions\Adapters\AdapterException;
use Mobian\ResellerApi\Factories\ResponseFactory;
use Mobian\ResellerApi\Requests\AbstractRequest;
use Mobian\ResellerApi\Responses\AbstractResponse;

/**
 * @todo Implement multi cURL method for optimized performance.
 */
class CurlAdapter
{
    /**
     * @var CurlAdapter
     */
    private static $instance;

    /**
     * Get the MOBIAN API instance.
     *
     * @return CurlAdapter
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Builds the URL used for the request.
     *
     * @param AbstractRequest $request
     *
     * @return string
     */
    private function buildUrlForRequest(AbstractRequest $request)
    {
        $url = ApiConfig::getHostname() . $request->getEndpoint();

        if ($request->hasParams()) {
            $url .= '?' . http_build_query($request->getParams());
        }

        return $url;
    }

    /**
     * Execute an API request.
     *
     * @param AbstractRequest $request
     *
     * @throws AdapterException
     *
     * @return AbstractResponse
     */
    public function execute(AbstractRequest $request)
    {
        $url = $this->buildUrlForRequest($request);
        $method = mb_strtoupper($request->getMethod());

        $identificationHeader = sprintf('%s: %s', ApiConfig::getAuthIdentifier(), ApiConfig::getAuthKey());

        $options = [
            CURLOPT_HEADER => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Accept-Language: ' . ApiConfig::getLanguage(),
                'Content-Type: application/json',
                'User-Agent: mobian-reseller-package/' . ApiConfig::VERSION,

                // Add identification header
                $identificationHeader,
            ],
        ];

        if ($request->hasContents()) {
            $options += [
                CURLOPT_POSTFIELDS => json_encode($request->getContents()),
            ];
        }

        $curl = curl_init();

        foreach ($options as $option => $value) {
            curl_setopt($curl, $option, $value);
        }

        $response = curl_exec($curl);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);

        $responseCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        $responseHeader = mb_substr($response, 0, $headerSize);
        $responseContentType = self::parseContentType($responseHeader);

        $response = mb_substr($response, $headerSize);

        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            // Something unexpected happened during execution
            throw new AdapterException($error);
        }

        return ResponseFactory::make($response, $responseContentType, $responseCode);
    }

    /**
     * Parses the value of the content type header.
     *
     * @param string $responseHeader
     *
     * @return string|null
     */
    private static function parseContentType($responseHeader)
    {
        $headers = explode(PHP_EOL, $responseHeader);

        foreach ($headers as $header) {
            if (mb_strpos($header, 'content-type') === 0) {
                return trim(explode(':', $header)[1]);
            }
        }
    }
}
