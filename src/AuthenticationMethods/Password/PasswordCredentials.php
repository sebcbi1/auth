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
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var password
     */
    private $password;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return PasswordCredentials
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
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
