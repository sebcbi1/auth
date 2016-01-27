<?php

/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:13
 */
namespace Auth\AuthenticationMethods\Password;

use Auth\Credentials;

class PasswordCredentials extends Credentials
{

    /**
     * @var string
     */
    private $email;

    /**
     * @var password
     */
    private $password;


    public function __construct(PasswordGatewayInterface $gateway)
    {
        $this->authenticationMethod = new PasswordAuthentication($this, $gateway);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return PasswordCredentials
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param password $password
     * @return PasswordCredentials
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

}
