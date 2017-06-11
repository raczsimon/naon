<?php
namespace Naon\Helpers;

use Nette;

class UserStorage implements Nette\Security\IUserStorage
{
    
	private $identity;
    
	function setAuthenticated($state)
	{
        $_SESSION['auth'] = $state;
	}
    
	function isAuthenticated()
	{
		return $_SESSION['auth'];
	}
    
	function setIdentity(Nette\Security\IIdentity $identity = NULL)
	{
		$this->identity = $identity;
	}
    
	function getIdentity()
	{
		return $this->identity;
	}
    
	function setExpiration($time, $flags = 0)
	{
	}
	function getLogoutReason()
	{
	}
}