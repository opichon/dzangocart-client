<?php
namespace Dzangocart\Client;

use \pcrypt;
use Guzzle\Http\Client as GuzzleClient;

class Client extends GuzzleClient
{
    public function getOrders()
    {
        return array();
    }

	public function encode($data, $key, $expires) 
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