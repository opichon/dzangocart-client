<?php

namespace Dzangocart\OM;

class Category extends DzangocartObject
{
    public function getName()
    {
        return $this->data['name'];
    }

    public function getCode()
    {
        return $this->data['code'];
    }

    public function getSuffix()
    {
        return $this->data['suffix'];
    }

    public function getPrice()
    {
        return $this->data['price'];
    }

    public function getTaxIncluded()
    {
        return (bool)$this->data['taxIncluded'];
    }

    public function getExport()
    {
        return (bool)$this->data['export'];
    }

    public function getShipping()
    {
        return (bool)$this->data['shipping'];
    }

    public function getDownload()
    {
        return (bool)$this->data['download'];
    }

    public function getPack()
    {
        return (bool)$this->data['pack'];
    }

    public function getMinQuantity()
    {
        return $this->data['minQuantity'];
    }

    public function getMaxQuantity()
    {
        return $this->data['maxQuantity'];
    }
}
