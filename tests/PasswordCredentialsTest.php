<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 25/01/16
 * Time: 15:47
 */

namespace Auth;

use Auth\AuthenticationMethods\Password\PasswordCredentials;

class PasswordCredentialTest extends \PHPUnit_Framework_TestCase
{
    private $passwordGateway;

    public function setup()
    {
        $this->passwordGateway = $this->getMock('Auth\\AuthenticationMethods\\Password\\PasswordGatewayInterface');

        $passwordCredentials = new PasswordCredentials($this->passwordGateway);
        $passwordCredentials->setUserId(48);
        $passwordCredentials->setPassword(password_hash("password", PASSWORD_DEFAULT));
        $passwordCredentials->setEmail('user@mail.com');

        $closure = function($email) use ($passwordCredentials) {
            if ($email == 'user@mail.com') {
                return $passwordCredentials;
            }
            return false;
        };

        $this->passwordGateway->expects($this->any())
             ->method('findByEmail')
             ->will($this->returnCallback($closure));

    }

    public function testCheck()
    {
        $passwordCredentials = new PasswordCredentials($this->passwordGateway);

        $passwordCredentials->setEmail('user@mail.com');
        $passwordCredentials->setPassword('password');
        $this->assertEquals(true, $passwordCredentials->verify());
        $this->assertEquals(48, $passwordCredentials->getUserId());

        $passwordCredentials = new PasswordCredentials($this->passwordGateway);
        $passwordCredentials->setEmail('invaliduser@mail.com');
        $passwordCredentials->setPassword('password');
        $this->assertEquals(false, $passwordCredentials->verify());
        $this->assertNull($passwordCredentials->getUserId());

        $passwordCredentials = new PasswordCredentials($this->passwordGateway);
        $passwordCredentials->setEmail('user@mail.com');
        $passwordCredentials->setPassword('invalidpassword');
        $this->assertEquals(false, $passwordCredentials->verify());
        $this->assertNull($passwordCredentials->getUserId());

    }
}
