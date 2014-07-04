<?php

namespace Dzangocart\OM;

class Category extends DzangocartObject
{
    public function getName()
    {
        return $this->data['name'];
    }

    public function setName($name)
    {
        $this->data['name'] = $name ;
    }

    public function getCode()
    {
        return $this->data['code'];
    }

    public function setCode($code)
    {
        $this->data['code'] = $code ;
    }

    public function getSuffix()
    {
        return $this->data['suffix'];
    }

    public function setSuffix($suffix)
    {
        $this->data['suffix'] = $suffix ;
    }

    public function getPrice()
    {
        return $this->data['price'];
    }

    public function setPrice($price)
    {
        $this->data['price'] = $price ;
    }

    public function getTaxIncluded()
    {
        return (bool)$this->data['taxIncluded'];
    }

    public function setTaxIncluded($taxIncluded)
    {
        (bool)$this->data['taxIncluded'] = $taxIncluded ;
    }

    public function getExport()
    {
        return (bool)$this->data['export'];
    }

    public function setExport($export)
    {
        (bool)$this->data['export'] = $export;
    }

    public function getShipping()
    {
        return (bool)$this->data['shipping'];
    }

    public function setShipping($shipping)
    {
        (bool)$this->data['shipping'] = $shipping;
    }

    public function getDownload()
    {
        return (bool)$this->data['download'];
    }

    public function setDownload($download)
    {
       (bool)$this->data['download'] = $download;
    }

    public function getPack()
    {
        return (bool)$this->data['pack'];
    }

    public function setPack($pack)
    {
        (bool)$this->data['pack'] = $pack;
    }

    public function getMinQuantity()
    {
        return $this->data['minQuantity'];
    }

    public function setMinQuantity($minQuantity)
    {
        $this->data['minQuantity'] = $minQuantity;
    }

    public function getMaxQuantity()
    {
        return $this->data['maxQuantity'];
    }

    public function setMaxQuantity($maxQuantity)
    {
        $this->data['maxQuantity'] = $maxQuantity ;
    }
}
