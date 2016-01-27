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

class SessionCredentialsTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $sessionCredentials = new SessionCredentials('testSessionId');
        $sessionCredentials->setSessionUserId(48);
        session_write_close();
    }

    public function testVerify()
    {
        $credentials = new SessionCredentials('testSessionId');
        $this->assertEquals(true, $credentials->verify());
        $this->assertEquals(48, $credentials->getUserId());
        session_write_close();


        $credentials = new SessionCredentials('invalidSessionId');
        $this->assertEquals(false, $credentials->verify());
        $this->assertNull($credentials->getUserId());
        session_write_close();

        $credentials = new SessionCredentials();
        $this->assertEquals(false, $credentials->verify());
        $this->assertNull($credentials->getUserId());
        session_write_close();

    }
}
