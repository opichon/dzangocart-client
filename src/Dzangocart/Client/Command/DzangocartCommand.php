<?php 

namespace Dzangocart\Client\Command;

use Guzzle\Service\ClientInterface;
use Guzzle\Service\Command\OperationCommand;

class DzangocartCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    public function setClient(ClientInterface $client)
    {
        parent::setClient($client);

//        $this->set(self::RESPONSE_PROCESSING, self::TYPE_RAW);

        $this->set('token', $this->getClient()->getConfig('token'));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function process()
    {
        if ($this->get(self::RESPONSE_PROCESSING) == self::TYPE_RAW) {
            $this->result = $this->request->getResponse();
        } else {
            $encrypted_response = $this->request->getResponse()->getBody(true);
            $decrypted_response = json_decode(
                $this->getClient()->decrypt(
                    $encrypted_response, 
                    $this->getClient()->getConfig('secret_key')
                ),
                true
            );

            $this->result = $decrypted_response;
        }
    }
}