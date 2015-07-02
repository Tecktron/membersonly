<?php

namespace tecktron\membersonly\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;

	/**
	* Constructor
	*
	* @param \phpbb\user $user
	* @param string $root_path
	* @param string $php_ext
	*/
	public function __construct(\phpbb\user $user, \phpbb\request\request $request, $root_path, $php_ext)
	{
		$this->user = $user;
		$this->request = $request;
		$this->root_path = $root_path;
		$this->phpEx = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup' => 'redirect_if_not_logged_in',
		);
	}

	/**
	 * redirect_if_not_logged_in
	 * This will redirect any not-logged in user to the login page
	 *
	 * @param $event
	 *
	 */
	public function redirect_if_not_logged_in($event)
	{
		// Check to see if we are already logged in, if we are, bypass all this.
		if ($this->user->data['user_id'] == ANONYMOUS)
		{
			//The base filename for the login page.
			$base = "ucp.$this->phpEx";
			//We use php self server variable since it's the most reliable way
			$current = $this->request->server('PHP_SELF');
			//if we are on the page, then we can just return.
			if (strpos($current, $base) !== false)
			{
				return;
			}
			//generate the login url
			$login =  append_sid($this->root_path . $base, 'mode=login');
			redirect($login);
		}
	}
}