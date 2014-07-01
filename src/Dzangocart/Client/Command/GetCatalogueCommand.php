<?php

namespace Dzangocart\Client\Command;

class GetCatalogueCommand extends AbstractCommand
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
