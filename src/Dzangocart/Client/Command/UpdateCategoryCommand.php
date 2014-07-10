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

    protected function process()
    {
        parent::process();

        $config = $this->getResponse();

        echo "inside client" . "<br>";
        echo "<pre>";
        print_r($config);

    }
}
