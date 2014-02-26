<?php

namespace Dzangocart\Client\Command;

use Dzangocart\OM\Order;

class GetOrderCommand extends AbstractCommand
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

        $config = $this->getClient()->getConfig();

        $cls = $config['om_classes']['order'];

        $order = new $cls($this->result);

        $this->result = $order;
    }
}
