<?php

namespace Dzangocart\Client\Command;

use Dzangocart\OM\DzangocartOrder as Order;

class DzangocartGetOrdersCommand extends DzangocartCommand
{

    public function process()
    {
        parent::process();

        $list = $this->result['list'];

        $orders = array();

        foreach ($list as $item) {
            $orders[] = new Order($item);
        }

        $this->result['list'] = $orders;
    }
}
