<?php

namespace Dzangocart\Client\Command;

class GetPurchasesCommand extends AbstractCommand
{
    public function process()
    {
        parent::process();
/*
        $list = $this->result['list'];

        $orders = array();

        foreach ($list as $order) {
            $orders[] = new Order($order);
        }

        $this->result['list'] = $orders;
*/
    }
}
