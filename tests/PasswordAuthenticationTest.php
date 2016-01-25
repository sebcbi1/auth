<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 25/01/16
 * Time: 15:47
 */

namespace Auth;


use Auth\AuthenticationMethods\Password\PasswordAuthentication;
use Auth\AuthenticationMethods\Password\PasswordCredentials;

class PasswordAuthenticationTest extends \PHPUnit_Framework_TestCase
{
    private $passwordGateway;

    public function setup()
    {
        $passwordCredentials = new PasswordCredentials();
        $passwordCredentials->setUserId(48);
        $passwordCredentials->setPassword(password_hash("password", PASSWORD_DEFAULT));
        $passwordCredentials->setEmail('user@mail.com');

        $closure = function($email) use ($passwordCredentials) {
            if ($email == 'user@mail.com') {
                return $passwordCredentials;
            }
            return false;
        };


        $this->passwordGateway = $this->getMock('Auth\\AuthenticationMethods\\Password\\PasswordGatewayInterface');
        $this->passwordGateway->expects($this->any())
             ->method('findByEmail')
             ->will($this->returnCallback($closure));
    }

    public function testCheck()
    {
        $passwordCredentials = new PasswordCredentials();

        $passwordCredentials->setEmail('user@mail.com');
        $passwordCredentials->setPassword('password');
        $passwordAuthentication = new PasswordAuthentication($passwordCredentials, $this->passwordGateway);
        $this->assertEquals(48, $passwordAuthentication->check());

        $passwordCredentials->setEmail('invaliduser@mail.com');
        $passwordCredentials->setPassword('password');
        $passwordAuthentication = new PasswordAuthentication($passwordCredentials, $this->passwordGateway);
        $this->assertEquals(false, $passwordAuthentication->check());

        $passwordCredentials->setEmail('user@mail.com');
        $passwordCredentials->setPassword('invalidpassword');
        $passwordAuthentication = new PasswordAuthentication($passwordCredentials, $this->passwordGateway);
        $this->assertEquals(false, $passwordAuthentication->check());

    }
}
