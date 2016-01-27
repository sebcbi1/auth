<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 25/01/16
 * Time: 15:47
 */

namespace Auth;

use Auth\AuthenticationMethods\Session\SessionAuthentication;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->credentials = new Credentials();
    }

    public function testNoAuthenticationMethodSet()
    {
        $this->setExpectedException('Exception');
        $this->credentials->verify();
    }

    public function testSetAuthenticationMethod()
    {
        $authenticationMethod = $this->getMock('Auth\\AuthenticationMethodInterface');
        $this->credentials->setAuthenticationMethod($authenticationMethod);
        $this->assertInstanceOf('Auth\\AuthenticationMethodInterface', $this->credentials->getAuthenticationMethod());
    }
}
