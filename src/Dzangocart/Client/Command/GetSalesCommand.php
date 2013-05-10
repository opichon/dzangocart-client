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

        foreach ($list as $sale) {
            $sales[] = new Sale($sale);
        }

        $this->result['results'] = $sales;
    }
}
