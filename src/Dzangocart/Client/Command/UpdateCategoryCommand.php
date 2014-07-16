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

    public function process()
    {
        parent::process();

        $config = $this->getClient()->getConfig();

        $cls = $config['om_classes']['category'];

        $category = new $cls($this->data);

        $this->result = $category;

    }
}
