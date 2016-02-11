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

    private $sessionId;

    public function __construct($sessionId = null)
    {
        $this->setSessionId($sessionId);
    }

    public function getSessionId()
    {
        if (empty($this->sessionId)) {
            $this->start();
        }
        return $this->sessionId;
    }

    public function setSessionId($sessionId)
    {
        if (!empty($sessionId)) {
            if (PHP_SESSION_NONE === session_status()) {
                $this->sessionId = $sessionId;
                return;
            }
            throw new \Exception('Session already started. cannot change session id.');
        }
    }

    public function has($key)
    {
        $this->start();
        return isset($_SESSION[$key]);
    }

    public function set($key, $value)
    {
        $this->start();
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        $this->start();
        return (!empty($_SESSION[$key])) ? $_SESSION[$key] : false;
    }

    
	public function delete($key)
	{
	    $this->start();
	    if ($this->has($key)) {
		    unset($_SESSION[$key]);
		}
	}

	
    public function start() {
        if (PHP_SESSION_NONE === session_status()) {
            if (!empty($this->sessionId)) {
                session_id($this->sessionId);
            }
            if (php_sapi_name() == 'cli') {
                ini_set('session.use_cookies', 0);
                ini_set("session.use_only_cookies", 0);
                ini_set("session.cache_limiter", "");
            }
            session_start();
            if (empty($this->sessionId)) {
                $this->sessionId = session_id();
            }
            return true;
        }
        return false;
    }

    public function close()
    {
        if (PHP_SESSION_ACTIVE === session_status()) {
            session_write_close();
            return true;
        }
        return false;
    }

    public function destroy()
    {
        if (PHP_SESSION_ACTIVE === session_status()) {
            session_destroy();
            return true;
        }
        return false;
    }



}
