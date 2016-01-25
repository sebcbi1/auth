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
    private $gateway;

    private $credentials;

    public function __construct(PasswordCredentials $credentials, PasswordGatewayInterface $gateway)
    {
        $this->credentials = $credentials;
        $this->gateway = $gateway;
    }

    public function check()
    {
        $savedCredentials = $this->gateway->findByEmail($this->credentials->getEmail());
        if ($savedCredentials instanceof PasswordCredentials && password_verify($this->credentials->getPassword(), $savedCredentials->getPassword())) {
            return $savedCredentials->getUserId();
        }
        return false;
    }
}
