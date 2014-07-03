<?php

namespace Dzangocart\OM;

class Category extends DzangocartObject
{
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
}
