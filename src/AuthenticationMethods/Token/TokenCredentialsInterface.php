<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 10/02/16
 * Time: 14:52
 */
namespace Auth\AuthenticationMethods\Token;

use Auth\CredentialsInterface;

interface TokenCredentialsInterface extends CredentialsInterface
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token);
}
