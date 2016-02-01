<?php

namespace SimpleBus\RabbitMQBundleBridge\Event;

use Exception;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class MessageConsumptionFailed extends AbstractMessageEvent
{
    /**
     * @var Exception
     */
    private $exception;

    /**
     * @var int
     */
    private $responseMethod = ConsumerInterface::MSG_REJECT;

    public function __construct(AMQPMessage $message, Exception $exception)
    {
        parent::__construct($message);

        $this->exception = $exception;
    }

    public function exception()
    {
        return $this->exception;
    }

    /**
     * @return int
     */
    public function getResponseMethod()
    {
        return $this->responseMethod;
    }

    /**
     * @param int $responseMethod
     */
    public function setResponseMethod($responseMethod)
    {
        $this->responseMethod = $responseMethod;
    }
}
