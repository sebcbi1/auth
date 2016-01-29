<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 15:35
 */

namespace Auth\AuthenticationMethods\Token;

use Auth\AuthenticationMethodInterface;

class TokenAuthentication implements AuthenticationMethodInterface
{
    private $repository;

    private $credentials;

    public function __construct(TokenCredentials $credentials, TokenRepositoryInterface $repository)
    {
        $this->credentials = $credentials;
        $this->repository = $repository;
    }

    public function check()
    {
        $savedCredentials = $this->repository->findByToken($this->credentials->getToken());
        if ($savedCredentials) {
            return $savedCredentials->getUserId();
        }
        return false;
    }
}
