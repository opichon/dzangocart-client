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

        $order = new Order($this->result);

        $this->result = $order;
    }
}
