<?php

namespace Dzangocart\OM;

class Catalogue extends DzangocartObject
{
    public function getName()
    {
        return $this->data['name'];
    }

    public function getPrice()
    {
        return $this->data['price'];
    }

    public function getCurrencyId()
    {
        return $this->data['currency_id'];
    }

    public function getTaxIncluded()
    {
        return $this->data['tax_include'];
    }

    public function getFixedPrice()
    {
        return $this->data['fixed_price'];
    }

    public function getCategory()
    {
        return $this->data['categories'];
    }

    public function hasChildren()
    {
        return $this->getCategory() ? true : false;  
    }

}