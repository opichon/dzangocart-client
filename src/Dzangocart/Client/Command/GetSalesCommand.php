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

        $list = $this->result['data'];

        $sales = array();

        foreach ($list as $index => $_sales) {

            if (array_key_exists('id', $_sales)) {
                $sale = $_sales;

                $cls = $this->getSaleClass($sale);

                $sales[$index] = new $cls($sale);
            } else {
                foreach ($_sales as $sale) {
                    $cls = $this->getSaleClass($sale);

                    $sales[$index] = new $cls($sale);
                }
            }
        }

        $this->result['results'] = $sales;
    }

    protected function getSaleClass($sale)
    {
        $config = $this->getClient()->getConfig()['om_classes']['sale'];

        if (is_array($config)) {
            $category = $sale['category'];

            if (array_key_exists($category, $config)) {
                $cls = $config[$category];
            } elseif (array_key_exists('default', $config)) {
                $cls = $config['default'];
            } else {
                $cls = 'Dzangocart\OM\Sale';
            }
        } else {
            $cls = $config;
        }

        return $cls;
    }
}
