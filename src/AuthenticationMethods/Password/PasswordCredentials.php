<?php

/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:13
 */
namespace Auth\AuthenticationMethods\Password;

use Auth\Credentials;

class PasswordCredentials extends Credentials implements PasswordCredentialsInterface
{

    /**
     * @var string
     * should be unique (can be email ...)
     */
    private $loginName;

    /**
     * @var password
     */
    private $password;


//    public function __construct(PasswordRepositoryInterface $repository)
//    {
//        $this->authenticationMethod = new PasswordAuthentication($this, $repository);
//    }

    /**
     * @return string
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * @param string $loginName
     * @return PasswordCredentials
     */
    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
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
