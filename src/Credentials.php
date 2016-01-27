<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:37
 */

namespace Auth;

class Credentials
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @var AuthenticationMethodInterface
     */
    protected $authenticationMethod;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return AuthenticationMethodInterface
     */
    public function getAuthenticationMethod()
    {
        return $this->authenticationMethod;
    }

    /**
     * @param AuthenticationMethodInterface $authenticationMethod
     * @return $this
     */
    public function setAuthenticationMethod(AuthenticationMethodInterface $authenticationMethod)
    {
        $this->authenticationMethod = $authenticationMethod;
        return $this;
    }

    public function verify()
    {
        if (!is_object($this->authenticationMethod)) {
            throw new \Exception('authentication method not set');
        }
        if ($userId = $this->authenticationMethod->check()) {
            $this->setUserId($userId);
            return true;
        }
        return false;
    }

}
