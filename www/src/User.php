<?php

namespace src;

/**
 * As mentioned in the tutorial, this class is shit. Never do these things.
 *
 * @url http://jtreminio.com/2013/03/unit-testing-tutorial-part-3-testing-protected-private-methods-coverage-reports-and-crap/
 */
class User
{
    const MIN_PASS_LENGTH = 4;
    
    private $user = array();
    
    public function __construct(array $user)
    {
        $this->user = $user;
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function setPassword($password)
    {
        if (strlen($password) < self::MIN_PASS_LENGTH) {
            return false;
        }
        $this->user['password'] = $this->cryptPassword($password);
        return true;
    }
    
    private function cryptPassword($password)
    {
        return md5($password);
    }
}