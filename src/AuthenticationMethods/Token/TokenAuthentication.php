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

    public function __construct(TokenCredentialsInterface $credentials, TokenRepositoryInterface $repository)
    {
        $this->credentials = $credentials;
        $this->repository = $repository;
    }


    public function verify()
    {
        $savedCredentials = $this->repository->findByToken($this->credentials->getToken());
        if ($savedCredentials) {
            $this->credentials->setUserId($savedCredentials->getUserId());
        }
        return $this->credentials;
    }


}
