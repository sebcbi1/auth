<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 10/02/16
 * Time: 14:48
 */
namespace Auth\AuthenticationMethods\Session;

use Auth\CredentialsInterface;

interface SessionCredentialsInterface extends CredentialsInterface
{
    /**
     * @return string
     */
    public function getSessionKey();

    /**
     * @return string
     */
    public function getSessionId();

    /**
     * @param $sessionId
     * @return $this
     */
    public function setSessionId($sessionId);
}
