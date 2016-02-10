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
    private $passwordRepository;

    public function setup()
    {

        $passwordCredentials = new PasswordCredentials();
        $passwordCredentials->setUserId(48);
        $passwordCredentials->setPassword(password_hash("password", PASSWORD_DEFAULT));
        $passwordCredentials->setLoginName('user@mail.com');


        $closure = function($email) use ($passwordCredentials) {
            if ($email == 'user@mail.com') {
                return $passwordCredentials;
            }
            return false;
        };

        $this->passwordRepository = $this->getMock('Auth\\AuthenticationMethods\\Password\\PasswordRepositoryInterface');
        $this->passwordRepository->expects($this->any())
             ->method('findByLoginName')
             ->will($this->returnCallback($closure));

    }

    public function testCheck()
    {
        $passwordCredentials = new PasswordCredentials();

        $passwordCredentials->setLoginName('user@mail.com');
        $passwordCredentials->setPassword('password');
        $passwordAuthentication = new PasswordAuthentication($passwordCredentials, $this->passwordRepository);

        $this->assertEquals(48, $passwordAuthentication->verify()->getUserId());

        $passwordCredentials = new PasswordCredentials();
        $passwordCredentials->setLoginName('invaliduser@mail.com');
        $passwordCredentials->setPassword('password');
        $passwordAuthentication = new PasswordAuthentication($passwordCredentials, $this->passwordRepository);
        $this->assertNull($passwordAuthentication->verify()->getUserId());

        $passwordCredentials = new PasswordCredentials();
        $passwordCredentials->setLoginName('user@mail.com');
        $passwordCredentials->setPassword('invalidpassword');
        $passwordAuthentication = new PasswordAuthentication($passwordCredentials, $this->passwordRepository);
        $this->assertNull($passwordAuthentication->verify()->getUserId());
    }
}
