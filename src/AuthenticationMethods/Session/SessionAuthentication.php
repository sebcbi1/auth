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

    private $repository;

    public function __construct(SessionRepositoryInterface $sessionRepository = null)
    {
        if (is_null($sessionRepository)) {
            $sessionRepository = new SessionRepository();
        }
        $this->repository = $sessionRepository;
    }

    public function verify()
    {
        $credentials = new SessionCredentials();
        if ($userId = $this->repository->get($credentials->getSessionKey())) {
            $credentials->setUserId($userId);
            $credentials->setSessionId($this->repository->getSessionId());
        }
        return $credentials;
    }


}
