<?php

namespace Dzangocart\Client\Command;

use Dzangocart\OM\Order;

class GetOrdersCommand extends AbstractCommand
{

    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        $this->set('command.response_processing', 'raw');
    }

    public function process()
    {
        parent::process();

        $list = $this->result['data'];

        $orders = array();

        $config = $this->getClient()->getConfig();

        $cls = $config['om_classes']['order'];

        foreach ($list as $order) {
            $orders[] = new $cls($order);
        }

        $this->result['list'] = $orders;
    }
}
