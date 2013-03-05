<?php
    
namespace src\Test;

use src\URL;

class URLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test src\URL::sluggify()
     *
     * @param string $original  String to be sluggified
     * @param string $expected  What the result should be
     * 
     * @dataProvider providerTestSluggifyReturnsSluggifiedString
     */
    public function testSluggifyReturnsSluggifiedString($original, $expected)
    {
        $url = new URL();
        $result = $url->sluggify($original);
        $this->assertEquals($expected, $result);
    }
    
    /**
     * Dataprovider for self::testSluggifyReturnsSluggifiedString()
     */
     public function providerTestSluggifyReturnsSluggifiedString()
     {
         return array(
             array('This string will be sluggified', 'this-string-will-be-sluggified'),
             array('THIS STRING WILL BE SLUGGIFIED', 'this-string-will-be-sluggified'),
             array('This1 string2 will3 be 44 sluggified10', 'this1-string2-will3-be-44-sluggified10'),
             array('This! @string#$ %$will ()be "sluggified', 'this-string-will-be-sluggified'),
             array("Tänk efter nu – förr'n vi föser dig bort", 'tank-efter-nu-forrn-vi-foser-dig-bort'),
             array('', ''),
         );
     }
}