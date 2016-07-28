<?php

namespace repat\ShippingServiceProvidersCheck;

use function Stringy\create as s;
use Goutte\Client;

class Check
{
    private $trackingId;
    private $client;

    public function __construct($trackingId)
    {
        $this->trackingId = $trackingId;
        $this->client = new Client();
    }

    public function checkAll(array $shippingProviders = null)
    {
        $defaultShippingProviders = include __DIR__ . '/default_providers.php';

        if (isset($shippingProviders)) {
            $shippingProviders = array_replace($defaultShippingProviders, $shippingProviders);
        } else {
            $shippingProviders = $defaultShippingProviders;
        }

        $response = [];

        foreach ($shippingProviders as $shippingProvider => $parameters) {
            $response[$shippingProvider] = $this->check($parameters);
        }

        return $response;
    }

    public function getProviders(array $shippingProviders)
    {
        return array_keys($shippingProviders);
    }

    private function check(array $parameters)
    {
        $crawler = $this->client->request('GET', $parameters["base_url"] . $this->trackingId);

        return in_array(true, $crawler->filter($parameters["filter"])->each(function ($node) use ($parameters) {
            if (s($node->text())->contains($parameters["search_string"])) {
                return true;
            }
            return false;
        })) ? true : false;
    }
}
