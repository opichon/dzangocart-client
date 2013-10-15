<?php

namespace Dzangocart\Client\Command;

class GetDirectPaymentsCommand extends AbstractCommand
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

        $list = $this->result;

        $this->result = array(
            'data' => $list
        );
    }
}
