<?php

namespace Mobian\ResellerApi\Adapters;

use Mobian\ResellerApi\ApiConfig;
use Mobian\ResellerApi\Exceptions\Adapters\AdapterException;
use Mobian\ResellerApi\Requests\AbstractRequest;
use Mobian\ResellerApi\Responses\PlainTextResponse;

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
     * @return PlainTextResponse
     */
    public function execute(AbstractRequest $request)
    {
        $url = $this->buildUrlForRequest($request);
        $method = strtoupper($request->getMethod());

        $identificationHeader = sprintf('%s: %s', ApiConfig::getAuthIdentifier(), ApiConfig::getAuthKey());

        $options = [
            CURLOPT_HEADER => 0,
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
        $responseCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            // Something unexpected happened during execution
            throw new AdapterException($error);
        }

        return new PlainTextResponse($response, $responseCode);
    }
}
