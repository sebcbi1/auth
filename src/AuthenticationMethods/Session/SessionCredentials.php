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
     * @var int
     */
    private $userId;

    /**
     * @var string;
     */
    private $sessionId;


    public static function fromCookie()
    {
        $credentials = new self();
        if (isset($_COOKIE[session_name()])) {
            if (PHP_SESSION_NONE === session_status()) {
                session_start();
            }
            $credentials->setSessionId($_COOKIE[session_name()]);

            if (!empty($_SESSION['userId'])) {
                $credentials->setUserId($_SESSION['userId']);
            }
        }
        return $credentials;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return SessionCredentials
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return SessionCredentials
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }


}
