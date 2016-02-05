<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 15:32
 */

namespace Auth;


interface AuthenticationMethodInterface
{
    /**
     * @return CredentialsInterface
     */
    public function verify();
}
