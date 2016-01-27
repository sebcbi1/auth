<?php

/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:42
 */

namespace Auth\AuthenticationMethods\Session;

use Auth\AuthenticationMethodInterface;

class SessionAuthentication implements AuthenticationMethodInterface
{

    private $credentials;

    public function __construct(SessionCredentials $credentials)
    {
        $this->credentials = $credentials;
    }

    public function check()
    {
        if ($userId = $this->credentials->getSessionUserId()) {
            return $userId;
        }
        return false;
    }
}
