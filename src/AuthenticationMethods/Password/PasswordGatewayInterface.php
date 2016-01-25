<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:18
 */

namespace Auth\AuthenticationMethods\Password;


interface PasswordGatewayInterface
{
    public function findByEmail();
}
