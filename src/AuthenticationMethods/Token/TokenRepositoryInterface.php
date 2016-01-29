<?php
/**
 * Project: auth
 * User: sebcbi1
 * Date: 21/01/16
 * Time: 16:18
 */

namespace Auth\AuthenticationMethods\Token;


interface TokenRepositoryInterface
{
    public function findByToken();
}
