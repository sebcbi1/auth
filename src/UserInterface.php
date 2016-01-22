<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 15:27
 */

namespace Auth;


interface UserInterface
{
    public function getId();

    public function setId($id);
}
