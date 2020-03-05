<?php

namespace Mobian\ApiClient\Adapters;

use Mobian\ApiClient\Factories\ResponseFactory;
use Mobian\ApiClient\MobianApiConfig;
use Mobian\ApiClient\Requests\AbstractRequest;
use Mobian\ApiClient\Responses\AbstractResponse;

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
     * Execute API requests.
     *
     * @param AbstractRequest[] $requests
     *
     * @return AbstractResponse[]
     */
    public function execute(array $requests)
    {
        $curlRequests = [];
        foreach ($requests as $request) {
            $curlRequests[] = $this->createRequestHandle($request);
        }

        $multiHandle = curl_multi_init();
        foreach ($curlRequests as $curlHandle) {
            curl_multi_add_handle($multiHandle, $curlHandle);
        }

        $running = null;
        do {
            curl_multi_exec($multiHandle, $running);
        } while ($running);

        $curlResponses = [];
        foreach ($curlRequests as $handle) {
            $curlResponses[] = $this->createResponseForHandle($handle);

            curl_multi_remove_handle($multiHandle, $handle);
            curl_close($handle);
        }

        curl_multi_close($multiHandle);

        return $curlResponses;
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
        $url = MobianApiConfig::getHostname() . $request->getEndpoint();

        if ($request->hasParams()) {
            $url .= '?' . http_build_query($request->getParams());
        }

        return $url;
    }

    /**
     * Creates a single cURL handle to execute.
     *
     * @param AbstractRequest $request
     *
     * @return resource
     */
    private function createRequestHandle(AbstractRequest $request)
    {
        $url = $this->buildUrlForRequest($request);
        $method = mb_strtoupper($request->getMethod());

        $identificationHeader = sprintf('%s: %s', MobianApiConfig::getAuthIdentifier(), MobianApiConfig::getAuthKey());

        $options = [
            CURLOPT_HEADER => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Accept-Language: ' . MobianApiConfig::getLanguage(),
                'Content-Type: application/json',
                'User-Agent: mobian-reseller-package/' . MobianApiConfig::VERSION,

                // Add identification header
                $identificationHeader,
            ],
        ];

        // Add Accept-Currency header if given.
        if ($currency = MobianApiConfig::getCurrency()) {
            $options[CURLOPT_HTTPHEADER][] = sprintf('Accept-Currency: %s', $currency);
        }

        if ($request->hasContents()) {
            $options += [
                CURLOPT_POSTFIELDS => json_encode($request->getContents()),
            ];
        }

        $curl = curl_init();

        curl_setopt_array($curl, $options);

        return $curl;
    }

    /**
     * Create.
     *
     * @param resource $handle
     */
    private function createResponseForHandle($handle)
    {
        $error = curl_error($handle);

        if ($error) {
            return ResponseFactory::makeFailed($error);
        }

        $response = curl_multi_getcontent($handle);

        $headerSize = curl_getinfo($handle, CURLINFO_HEADER_SIZE);

        $responseCode = curl_getinfo($handle, CURLINFO_RESPONSE_CODE);
        $responseHeader = mb_substr($response, 0, $headerSize);
        $responseContentType = $this->parseContentType($responseHeader);

        $response = mb_substr($response, $headerSize);

        return ResponseFactory::make($response, $responseContentType, $responseCode);
    }

    /**
     * Parses the value of the content type header.
     *
     * @param string $responseHeader
     *
     * @return string|null
     */
    private function parseContentType(string $responseHeader)
    {
        $headers = explode(PHP_EOL, $responseHeader);

        foreach ($headers as $header) {
            if (mb_stripos($header, 'Content-Type') === 0) {
                return mb_strtolower(trim(explode(':', $header)[1]));
            }
        }
    }
}
