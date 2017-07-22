<?php

namespace Adapters;

use Adapters\ValueObjects\Event;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqEventsRepository implements EventsRepositoryInterface
{
	/**
	 * @var AMQPChannel
	 */
	private $channel;

	/**
	 * @var string
	 */
	private $queueName;

	/**
	 * @param AMQPChannel $channel
	 * @param string $queueName
	 */
	public function __construct(AMQPChannel $channel, string $queueName)
	{
		$this->channel = $channel;
		$this->queueName = $queueName;
	}

	/**
	 * @param Event $event
	 *
	 * @return void
	 */
	public function push(Event $event)
	{
		$message = new AMQPMessage($event->toJson());
		$this->channel->basic_publish($message, '', $this->queueName);
	}
}
