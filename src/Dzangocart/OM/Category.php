<?php

namespace Dzangocart\OM;

class Category extends DzangocartObject
{
    public function gettaxIncluded()
    {
        return (bool)$this->data['taxIncluded'];
    }

    public function getexport()
    {
        return (bool)$this->data['export'];
    }

    public function getshipping()
    {
        return (bool)$this->data['shipping'];
    }

    public function getdownload()
    {
        return (bool)$this->data['download'];
    }

    public function getpack()
    {
        return (bool)$this->data['pack'];
    }
}
