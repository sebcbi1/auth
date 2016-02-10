<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 25/01/16
 * Time: 15:47
 */

namespace Auth;


use Auth\AuthenticationMethods\Token\TokenAuthentication;
use Auth\AuthenticationMethods\Token\TokenCredentials;

class TokenAuthenticationTest extends \PHPUnit_Framework_TestCase
{
    private $tokenRepository;

    public function setup()
    {
        $this->tokenRepository = $this->getMock('Auth\\AuthenticationMethods\\Token\\TokenRepositoryInterface');

        $tokenCredentials = new TokenCredentials();
        $tokenCredentials->setUserId(48);
        $tokenCredentials->setToken('token');


        $closure = function($token) use ($tokenCredentials) {
            if ($token == 'token') {
                return $tokenCredentials;
            }
            return false;
        };

        $this->tokenRepository->expects($this->any())
             ->method('findByToken')
             ->will($this->returnCallback($closure));

    }

    public function testCheck()
    {
        $tokenCredentials = new TokenCredentials();
        $tokenCredentials->setToken('token');
        $tokenAuthentication = new TokenAuthentication($tokenCredentials, $this->tokenRepository);
        $this->assertEquals(48, $tokenAuthentication->verify()->getUserId());

        $tokenCredentials = new TokenCredentials();
        $tokenCredentials->setToken('invalidToken');
        $tokenAuthentication = new TokenAuthentication($tokenCredentials, $this->tokenRepository);
        $this->assertNull($tokenAuthentication->verify()->getUserId());
    }
}
