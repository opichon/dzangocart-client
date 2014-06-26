<?php

namespace Dzangocart\Client;

use \pcrypt;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class DzangocartClient extends Client
{
    /**
     * Factory method to create a new DzangocartClient
     *
     * The following array keys and values are available options:
     * - base_url: Base url of your Dzangocart store's API service
     * - token: The secret token used to authenticate access to your Dzangocart store's API service
     *
     * @param array|Collection $config Configuration data
     */
    public static function factory($config = array())
    {
        $defaults = array(
            'scheme' => 'http',
            'om_classes' => array(
                'order' => 'Dzangocart\OM\Order',
                'sale' => 'Dzangocart\OM\Sale',
                'customer' => 'Dzangocart\OM\Customer',
                'address' => 'Dzangocart\OM\Address'
            )
        );

        $required = array('api_url', 'token');
        $config = Collection::fromConfig($config, $defaults, $required);

        $client = new self($config->get('api_url'), $config);
        $description = ServiceDescription::factory(__DIR__ . '/dzangocart.json');
        $client->setDescription($description);

        return $client;
    }

    public function encode($data, $key, $expires = 3600000)
    {
        if (!array_key_exists('expires', $data)) {
            $data['expires'] = date('c', time() + $expires);
        }

        $userdata = json_encode($data);

        return $this->encrypt($userdata, $key);
    }

    public function encrypt($data, $key)
    {
        try {
            $cipher = new pcrypt($key);
            $result = $cipher->cipher($data);
        } catch (ErrorException $e) {
            $result = null;
        }

        return $result;
    }

    public function decrypt($data, $key)
    {
        try {
            $cipher = new pcrypt($key);
            $result = $cipher->decipher($data);
        } catch (ErrorException $e) {
            $result = null;
        }

        return $result;
    }
}
