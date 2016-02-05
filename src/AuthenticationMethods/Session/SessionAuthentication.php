<?php

/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:42
 */

namespace Auth\AuthenticationMethods\Session;

use Auth\AuthenticationMethodInterface;
use Auth\Credentials;

class SessionAuthentication implements AuthenticationMethodInterface
{

    private $repository;

    protected $sessionUserKey = 'userId';

    public function __construct(SessionRepositoryInterface $sessionRepository = null)
    {
        if (is_null($sessionRepository)) {
            $sessionRepository = new SessionRepository();
        }
        $this->repository = $sessionRepository;
    }

    public function verify()
    {
        if ($userId = $this->repository->get($this->sessionUserKey)) {
            $credentials = new SessionCredentials();
            $credentials->setUserId($userId);
            $credentials->setSessionId($this->repository->getSessionId());
            return $credentials;
        }
        return new Credentials();
    }


}
