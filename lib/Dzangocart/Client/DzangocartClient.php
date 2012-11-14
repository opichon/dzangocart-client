<?php

namespace Dzangocart\Client;

class DzangocartClient 
{
    public static function encode($data, $key, $expires) 
    {
        if (!array_key_exists('expires', $data)) {
            $data['expires'] = date('c', time() + $expires);
        }
        
        $userdata = json_encode($data);
        
        return self::encrypt($userdata, $key);
    }
  
    public static function encrypt($data, $key) 
    {
        try {
            $cipher = new \pcrypt($key);
            $result = $cipher->cipher($data);
        }
        catch (ErrorException $e) {
            $result = null;
        }
        
        return $result;
    }
}
