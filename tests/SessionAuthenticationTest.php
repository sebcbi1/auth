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
use Auth\AuthenticationMethods\Session\SessionRepository;

class SessionAuthenticationTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $repo = new SessionRepository('testSessionId');
        $repo->set('userId', 48);
        $repo->close();
    }

    public function testCheck()
    {
        //given session id
        $repo = new SessionRepository('testSessionId');
        $credentials = new SessionCredentials();
        $sessionAuthentication = new SessionAuthentication($credentials, $repo);
        $this->assertEquals(48, $sessionAuthentication->verify()->getUserId());
        $repo->close();

        //given invalid session id
        $repo = new SessionRepository('invalidSessionId');
        $credentials = new SessionCredentials();
        $sessionAuthentication = new SessionAuthentication($credentials, $repo);
        $this->assertNull($sessionAuthentication->verify()->getUserId());
        $repo->close();

        // without session id , let php generate new one
        $repo = new SessionRepository();
        $credentials = new SessionCredentials();
        $sessionAuthentication = new SessionAuthentication($credentials, $repo);
        $this->assertNull($sessionAuthentication->verify()->getUserId());
        $repo->close();

    }
}
