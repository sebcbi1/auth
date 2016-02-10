<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:45
 */

namespace Auth\AuthenticationMethods\Session;

use Auth\Credentials;

class SessionCredentials extends Credentials implements SessionCredentialsInterface
{
    /**
     * @var string;
     */
    private $sessionId;

    /**
     * @var string;
     */
    protected $sessionKey = 'userId';


    public function __construct($sessionId = null)
    {
        if (!empty($sessionId)) {
            $this->sessionId = $sessionId;
        }
    }

    /**
     * @return string
     */
    public function getSessionKey()
    {
        return $this->sessionKey;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }


    /**
     * @param $sessionId
     * @return $this
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
        return $this;
    }

}
