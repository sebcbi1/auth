<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 28/01/16
 * Time: 16:24
 */

namespace Auth\AuthenticationMethods\Session;

interface SessionRepositoryInterface
{
    public function getSessionId();

    public function setSessionId($sessionId);

    public function get($key);

    public function has($key);

    public function set($key, $value);

	public function delete($key);
}
