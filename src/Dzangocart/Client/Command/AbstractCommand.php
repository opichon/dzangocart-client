<?php

namespace Dzangocart\Client\Command;

use Guzzle\Service\Command\OperationCommand;

abstract class AbstractCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        $this->request->getQuery()->set('apikey', $this->getClient()->getConfig('token'));
    }

    /**
     * {@inheritdoc}
     */
    protected function process()
    {
        if (true || $this->get(self::RESPONSE_PROCESSING) == self::TYPE_RAW) {
            $this->result = json_decode($this->request->getResponse()->getBody(true), true);
        } else {
            $response = $this->request->getResponse()->getBody(true);

            $decrypted_response = json_decode(
                $this->getClient()->decrypt(
                    $response,
                    $this->getClient()->getConfig('secret_key')
                ),
                true
            );

            $this->result = $decrypted_response;
        }
    }
}
