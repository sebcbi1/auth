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
        $sessionAuthentication = new SessionAuthentication($repo);
        $this->assertEquals(48, $sessionAuthentication->verify()->getUserId());
        $repo->close();

        //given invalid session id
        $repo = new SessionRepository('invalidSessionId');
        $sessionAuthentication = new SessionAuthentication($repo);
        $this->assertNull($sessionAuthentication->verify()->getUserId());
        $repo->close();

        // without session id , let php generate new one
        $repo = new SessionRepository();
        $sessionAuthentication = new SessionAuthentication(new SessionRepository());
        $this->assertNull($sessionAuthentication->verify()->getUserId());
        $repo->close();

    }
}
