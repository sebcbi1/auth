<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 28/01/16
 * Time: 14:59
 */

namespace Auth\AuthenticationMethods\Session;


class SessionRepository implements SessionRepositoryInterface
{

    const USER_SESSION_KEY = 'userId';

    public function __construct()
    {
        if (php_sapi_name() == 'cli') {
            ini_set('session.use_cookies', 0);
            ini_set("session.use_only_cookies", 0);
            ini_set("session.cache_limiter", "");
        }
    }

    public function getBySessionId($sessionId)
    {
        $this->sessionStart($sessionId);
        if (empty($_SESSION[self::USER_SESSION_KEY])) {
            return false;
        }
        $credentials = new SessionCredentials($sessionId, $this);
        $credentials->setUserId($_SESSION[self::USER_SESSION_KEY]);
        return $credentials;
    }

    public function save(SessionCredentials $credentials)
    {
        if (!empty($credentials->getUserId())) {
            $sessionId = $credentials->getSessionId();
            $this->sessionStart($sessionId);
            $_SESSION[self::USER_SESSION_KEY] = $credentials->getUserId();
        }
    }

    protected function sessionStart(&$sessionId) {
        if (PHP_SESSION_NONE === session_status()) {
            if (!empty($sessionId)) {
                session_id($sessionId);
            }
            session_start();
            if (empty($sessionId)) {
                $sessionId = session_id();
            }
        }
    }
}
