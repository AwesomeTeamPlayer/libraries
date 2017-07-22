<?php

namespace Adapters;

use Adapters\ValueObjects\Event;

interface EventsRepositoryInterface
{
	/**
	 * @param Event $event
	 *
	 * @return void
	 */
	public function push(Event $event);
}
