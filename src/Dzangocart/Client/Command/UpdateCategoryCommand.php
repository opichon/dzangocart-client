<?php

namespace Dzangocart\Client\Command;

class UpdateCategoryCommand extends AbstractCommand
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
