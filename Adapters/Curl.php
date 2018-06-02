<?php

namespace MobianApi\Adapters;

use MobianApi\MobianConfig;
use MobianApi\Requests\AbstractRequest;

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
        $url = MobianConfig::getHostname() . $request->getEndpoint();

        if (in_array($request->getMethod(), ['get', 'delete'])) {
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
                'X-Auth-Token: ' . MobianConfig::getAuthKey(),
            ],
        ];

        $curl = curl_init();

        foreach ($options as $option => $value) {
            curl_setopt($curl, $option, $value);
        }

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
