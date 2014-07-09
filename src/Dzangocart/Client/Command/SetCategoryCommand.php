<?php

namespace Dzangocart\Client\Command;

class SetCategoryCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        
        $this->set('command.response_processing', 'raw');
    }

    protected function process()
    {

    }
}
