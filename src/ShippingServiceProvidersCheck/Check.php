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

    public function checkAll($shippingProviders)
    {
        $response = [];

        foreach ($shippingProviders as $shippingProvider => $parameters) {
            $response[$shippingProvider] = $this->check($parameters);
        }

        return $response;
    }

    public function getProviders($shippingProviders)
    {
        return array_keys($shippingProviders);
    }

    private function check($parameters)
    {
        $crawler = $this->client->request('GET', $parameters["base_url"] . $this->trackingId);

        return in_array(true, $crawler->filter($parameters["filter"])->each(function ($node) {
            if (s($node->text())->contains($parameters["search_string"])) {
                return true;
            }
        })) ? true : false;
    }
}
