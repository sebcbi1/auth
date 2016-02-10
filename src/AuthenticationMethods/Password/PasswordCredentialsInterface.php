<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 10/02/16
 * Time: 14:50
 */
namespace Auth\AuthenticationMethods\Password;

use Auth\CredentialsInterface;

interface PasswordCredentialsInterface extends CredentialsInterface
{
    /**
     * @return string
     */
    public function getLoginName();

    /**
     * @param string $loginName
     * @return PasswordCredentials
     */
    public function setLoginName($loginName);

    /**
     * @return password
     */
    public function getPassword();

    /**
     * @param password $password
     * @return PasswordCredentials
     */
    public function setPassword($password);
}
