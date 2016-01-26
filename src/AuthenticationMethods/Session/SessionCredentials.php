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


    public function __construct($sessionId = null)
    {
        if (php_sapi_name() == 'cli') {
            ini_set('session.use_cookies', 0);
            ini_set("session.use_only_cookies", 0);
            ini_set("session.cache_limiter", "");
        }
        if (!empty($sessionId)) {
            $this->sessionId = $sessionId;
        } else {
            if (isset($_COOKIE) && isset($_COOKIE[session_name()])) {
                $this->sessionId = $_COOKIE[session_name()];
            }
        }
    }

    private function sessionStart() {
        if (PHP_SESSION_NONE === session_status()) {
            if (!empty($this->sessionId)) {
                session_id($this->sessionId);
            }
            session_start();
            if (empty($this->sessionId)) {
                $this->sessionId = session_id();
            }
        }
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        $this->sessionStart();
        return $_SESSION['userId'];
    }

    /**
     * @param int $userId
     * @return SessionCredentials
     */
    public function setUserId($userId)
    {
        $this->sessionStart();
        $this->userId = $userId;
        $_SESSION['userId'] = $this->userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        $this->sessionStart();
        return $this->sessionId;
    }

}
