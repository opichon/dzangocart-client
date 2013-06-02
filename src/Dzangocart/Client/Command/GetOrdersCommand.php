<?php

namespace Dzangocart\Client\Command;

use Dzangocart\OM\Order;

class GetOrdersCommand extends AbstractCommand
{

    public function process()
    {
        parent::process();

        $list = $this->result['list'];

        $orders = array();

        foreach ($list as $order) {
            $orders[] = new Order($order);
        }

        $this->result['list'] = $orders;
    }
}