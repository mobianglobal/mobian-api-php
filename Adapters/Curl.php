<?php

namespace Mobian\ResellerApi\Adapters;

use Mobian\ResellerApi\ApiConfig;
use Mobian\ResellerApi\Requests\AbstractRequest;

class Curl
{
    /**
     * @var Curl
     */
    private static $instance;

    /**
     * Get the MOBIAN API instance.
     *
     * @todo Implement multi cURL method for optimized performance.
     * @return Curl
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function buildUrlForRequest(AbstractRequest $request)
    {
        $url = ApiConfig::getHostname() . $request->getEndpoint();

        if ($request->hasParams()) {
            $url .= '?' . http_build_query($request->getParams());
        }

        return $url;
    }

    public function execute(AbstractRequest $request)
    {
        $url = $this->buildUrlForRequest($request);
        $method = strtoupper($request->getMethod());

        $options = [
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Auth-Token: ' . ApiConfig::getAuthKey(),
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

        curl_close($curl);

        return $response;
    }
}
