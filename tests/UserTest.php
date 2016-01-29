<?php

/**
 * Project: auth
 * User: sebcbi1
 * Date: 28/01/16
 * Time: 11:32
 */

namespace Auth;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $user = new User();
        $user->setId(48);
        $this->assertEquals(48, $user->getId());
    }

    public function testAddCredentials()
    {
        $user = new User();
        $user->addCredentials(new Credentials());
        $this->assertEquals(1, count($user->getCredentials()));
    }
}
