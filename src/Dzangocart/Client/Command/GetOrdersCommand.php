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

        $config = $this->getClient()->getConfig();

        $cls = $config['om_classes']['order'];

        foreach ($list as $order) {
            $orders[] = new $cls($order);
        }

        $this->result['list'] = $orders;
    }
}
