<?php

/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:13
 */
namespace Auth\AuthenticationMethods\Token;

use Auth\Credentials;

class TokenCredentials extends Credentials implements TokenCredentialsInterface
{

    /**
     * @var string
     */
    private $token;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }


}
