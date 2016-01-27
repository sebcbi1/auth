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

    public function setUp()
    {
        $sessionCredentials = new SessionCredentials('testSessionId');
        $sessionCredentials->setSessionUserId(48);
        session_write_close();
    }

    public function testCheck()
    {
        $sessionAuthentication = new SessionAuthentication(new SessionCredentials('testSessionId'));
        $this->assertEquals(48, $sessionAuthentication->check());
        session_write_close();

        $sessionAuthentication = new SessionAuthentication(new SessionCredentials('invalidSessionId'));
        $this->assertEquals(false, $sessionAuthentication->check());
        session_write_close();
    }
}
