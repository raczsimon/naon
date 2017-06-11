<?php
namespace Naon\Helpers;

use Nette;
use Nette\Security as NS;

class Authenticator extends Nette\Object implements NS\IAuthenticator
{
    function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
        
        $row = $GLOBALS['em']->getRepository('Naon\Entity\User')->findOneByUsername($username);

		if (!$row) {
			throw new NS\AuthenticationException('User not found.');
		}

		if (!NS\Passwords::verify($password, $row->getPassword())) {
			throw new NS\AuthenticationException('Invalid password.');
		}

		return new NS\Identity($row->getId());
	}
}