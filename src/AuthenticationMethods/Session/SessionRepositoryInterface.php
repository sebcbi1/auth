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
    public function getBySessionId($sessionId);

    public function save(SessionCredentials $credentials);
}
