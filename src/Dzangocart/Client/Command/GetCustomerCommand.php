<?php

namespace Dzangocart\Client\Command;

class GetCustomerCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        $this->set('command.response_processing', 'raw');
    }

}
