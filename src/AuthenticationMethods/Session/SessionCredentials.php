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
//        if (is_null($sessionRepository)) {
//            $sessionRepository = new SessionRepository();
//        }
//        $this->authenticationMethod = new SessionAuthentication($this, $sessionRepository);

        if (!empty($sessionId)) {
            $this->sessionId = $sessionId;
        } else {
            if (isset($_COOKIE) && isset($_COOKIE[session_name()])) {
                $this->sessionId = $_COOKIE[session_name()];
            }
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
