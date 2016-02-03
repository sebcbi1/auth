<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:45
 */

namespace Auth\AuthenticationMethods\Session;

use Auth\Credentials;

class SessionCredentials extends Credentials
{
    /**
     * @var string;
     */
    private $sessionId;

    public function __construct($sessionId = null)
    {
        if (!empty($sessionId)) {
            $this->sessionId = $sessionId;
        }
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
