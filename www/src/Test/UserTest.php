<?php

namespace src\Test;

use src\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test src\User::setPassword()
     */
    public function testSetPasswordReturnsTrueWhenPasswordSuccessfullySet()
    {
        $details = array();
        $user = new User($details);
        
        $password = 'fubar';
        $result = $user->setPassword($password);
        
        $this->assertTrue($result);
    }
    
    /**
     * Test src\User::getUser()
     *
     * getUser() gives access to private property therefor this ends up testing:
     */
    public function testGetUserReturnsUserWithExpectedValues()
    {
        $details = array();
        $user = new User($details);
        
        $password = 'fubar';
        $result = $user->setPassword($password);
        
        $expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2'; // Hashed 'fubar'
        $currentUser = $user->getUser();

        $this->assertEquals($expectedPasswordResult, $currentUser['password']);
    }
    
    public function testSetPasswordReturnsFalseWhenPasswordLengthIsTooShort()
    {
        $details = array();
        $user = new User($details);
        $password = 'fub';
        $result = $user->setPassword($password);
        $this->assertFalse($result);
    }
    
    /**
     * Test private method, src\User::cryptPassword()
     */
     public function testPrivateMethodCryptPasswordReturnsMd5Hash()
     {
         $details = array();
         $user = new User($details);
         $password = 'fubar';
        
         $expectedPasswordResult = '5185e8b8fd8a71fc80545e144f91faf2'; // Hashed 'fubar'
         $result = $this->invokeMethod($user, 'cryptPassword', array($password));
         
         $this->assertEquals($expectedPasswordResult, $result);
     }
    
    /**
     * Call protected/private method of a class
     * 
     * @param object    &$object    Instantiated object that we will run method on
     * @param string    $methodName Method name to call
     * @param array     $parameters Array of parameters to pass into method
     *
     * @return mixed Method return
     */
     public function invokeMethod(&$object, $methodName, array $parameters = array())
     {
         $reflection = new \ReflectionClass(get_class($object));
         $method = $reflection->getMethod($methodName);
         $method->setAccessible(true);
         
         return $method->invokeArgs($object, $parameters);
     }
}