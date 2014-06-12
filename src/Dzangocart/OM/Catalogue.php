<?php

namespace Dzangocart\OM;

class Catalogue extends DzangocartObject
{
    public function getName()
    {

        return $this->name;
    }

    public function getPrice()
    {

        return $this->price;
    }

    public function getCurrencyId()
    {

        return $this->currency_id;
    }
}