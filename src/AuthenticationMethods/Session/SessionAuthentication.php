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

    protected $sessionUserKey = 'userId';

    public function __construct(SessionRepositoryInterface $sessionRepository = null)
    {
        if (is_null($sessionRepository)) {
            $sessionRepository = new SessionRepository();
        }
        $this->repository = $sessionRepository;
    }

    public function check()
    {
        if ($userId = $this->repository->get($this->sessionUserKey)) {
            return $userId;
        }
        return false;
    }


}
