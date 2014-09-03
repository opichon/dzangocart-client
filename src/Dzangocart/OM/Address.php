<?php

namespace Dzangocart\OM;

class Address extends DzangocartObject
{
    public function getStreet()
    {
        return $this->data['street'];
    }

    public function getComplement()
    {
        return $this->data['complement'];
    }

    public function getPostalCode()
    {
        return $this->data['postal_code'];
    }

    public function getLocality()
    {
        return $this->data['locality'];
    }

    public function getRegion()
    {
        return $this->data['region'];
    }

    public function getCountryId()
    {
        return $this->data['country_id'];
    }

    public function getLines()
    {
        $lines = array($this->getStreet());
        if ($line2 = $this->getComplement()) {
            $lines[] = $line2;
        }
        $lines[] = $this->getCityLine();
        $lines[] = $this->getCountryId();

        return $lines;
    }

    public function format($separator = "\n")
    {
        return implode($separator, $this->getLines());
    }

    protected function getCityLine()
    {
        return implode(' ', array($this->getPostalCode(), $this->getLocality()));
    }
}
