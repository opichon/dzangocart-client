<?php

namespace Dzangocart\Client\Command;

use Dzangocart\OM\Sale;

class GetSalesCommand extends AbstractCommand
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

        $list = $this->result['results'];

        $sales = array();

        $config = $this->getClient()->getConfig();

        $cls = $config['om_classes']['sale'];

        foreach ($list as $index => $sale) {
            $sales[$index] = new $cls($sale);
        }

        $this->result['results'] = $sales;
    }
}
