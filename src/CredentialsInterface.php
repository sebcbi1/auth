<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 05/02/16
 * Time: 15:00
 */
namespace Auth;

interface CredentialsInterface
{
    /**
     * @return int
     */
    public function getUserId();

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId);
}
