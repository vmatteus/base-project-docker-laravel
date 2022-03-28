<?php

namespace App\Services;

use NeedleProject\LaravelRabbitMq\Processor\AbstractMessageProcessor;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class CliOutputProcessor
 *
 * @package NeedleProject\LaravelRabbitMq\Processor
 * @author  Adrian Tilita <adrian@tilita.ro>
 * @codeCoverageIgnore
 */
class CliOutputProcessor extends AbstractMessageProcessor
{
    /**
     * @param AMQPMessage $message
     * @return bool
     */
    public function processMessage(AMQPMessage $message): bool
    {
        echo $message->getBody() . " => Vini \n";
        return true;
    }
}
