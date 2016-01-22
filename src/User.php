<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 15:28
 */

namespace Auth;


class User implements UserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}
