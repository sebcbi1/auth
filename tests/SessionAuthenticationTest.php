<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 25/01/16
 * Time: 15:47
 */

namespace Auth;

use Auth\AuthenticationMethods\Session\SessionAuthentication;
use Auth\AuthenticationMethods\Session\SessionCredentials;

class SessionAuthenticationTest extends \PHPUnit_Framework_TestCase
{

    public function testCheck()
    {
        $sessionCredentials = new SessionCredentials('tiausnretnrastpost');
        $sessionCredentials->setUserId(48);
        $sessionAuthentication = new SessionAuthentication($sessionCredentials);
        $this->assertEquals(48, $sessionAuthentication->check());
    }
}
