<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 15:35
 */

namespace Auth\AuthenticationMethods\Password;

use Auth\AuthenticationMethodInterface;

class PasswordAuthentication implements AuthenticationMethodInterface
{
    private $repository;

    private $credentials;

    public function __construct(PasswordCredentials $credentials, PasswordRepositoryInterface $repository)
    {
        $this->credentials = $credentials;
        $this->repository = $repository;
    }

    public function check()
    {
        $savedCredentials = $this->repository->findByLoginName($this->credentials->getLoginName());
        if ($savedCredentials instanceof PasswordCredentials && password_verify($this->credentials->getPassword(), $savedCredentials->getPassword())) {
            return $savedCredentials->getUserId();
        }
        return false;
    }
}
