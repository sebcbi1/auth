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

    public function __construct(SessionCredentials $credentials, SessionRepositoryInterface $sessionRepository = null)
    {
        $this->credentials = $credentials;

        if (is_null($sessionRepository)) {
            $sessionRepository = new SessionRepository();
        }
        $this->repository = $sessionRepository;
    }

    public function check()
    {
        $savedCredentials = $this->repository->getBySessionId($this->credentials->getSessionId());
        if ($savedCredentials) {
            return $savedCredentials->getUserId();
        }
    }


}
