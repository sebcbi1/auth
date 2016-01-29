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
        $sessionCredentials = new SessionCredentials('testSessionId');
        $repo = new SessionRepository();
        $sessionCredentials->setUserId(48);
        $repo->save($sessionCredentials);
        session_write_close();
    }

    public function testCheck()
    {
        //given session id
        $sessionAuthentication = new SessionAuthentication(new SessionCredentials('testSessionId'));
        $this->assertEquals(48, $sessionAuthentication->check());
        session_write_close();

        //given invalid session id
        $sessionAuthentication = new SessionAuthentication(new SessionCredentials('invalidSessionId'));
        $this->assertEquals(false, $sessionAuthentication->check());
        session_write_close();

        // without session id , let php generate new one
        $sessionAuthentication = new SessionAuthentication(new SessionCredentials());
        $this->assertEquals(false, $sessionAuthentication->check());
        session_write_close();

        // session id from cookie
        $_COOKIE[session_name()] = 'invalidSessionId';
        $sessionAuthentication = new SessionAuthentication(new SessionCredentials());
        $this->assertEquals(false, $sessionAuthentication->check());
        session_write_close();
    }
}
