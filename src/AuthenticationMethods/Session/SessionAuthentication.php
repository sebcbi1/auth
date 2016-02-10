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
    private $credentials;

    public function __construct(SessionCredentialsInterface $credentials, SessionRepositoryInterface $sessionRepository = null)
    {
        $this->repository = $sessionRepository;
        $this->credentials = $credentials;
    }

    public function verify()
    {
        if ($userId = $this->repository->get($this->credentials->getSessionKey())) {
            $this->credentials->setUserId($userId);
            $this->credentials->setSessionId($this->repository->getSessionId());
        }
        return $this->credentials;
    }


}
