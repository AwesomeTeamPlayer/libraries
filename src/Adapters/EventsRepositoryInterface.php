<?php

namespace AwesomeTeamPlayer\Libraries\Adapters;

use AwesomeTeamPlayer\Libraries\Adapters\ValueObjects\Event;

interface EventsRepositoryInterface
{
	/**
	 * @param Event $event
	 *
	 * @return void
	 */
	public function push(Event $event);
}
