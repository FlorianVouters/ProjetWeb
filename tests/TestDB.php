<?php


// need  "composer require --dev symfony/phpunit-bridge"
namespace App\Tests\TestBDD;

use App\Entity;
use App\Controller;
use PHPUnit\Framework\TestCase;

class testBDD extends TestCase
{
    public function testAddActivity()
    {
        $test = new Entity\Activity();
        $test->setName('Paintball');
        $this->assertEquals('Paintball', $test->getName());
    }
    public function testAddUser(){
        $test = new Entity\User();
        $test->setSurname('foo');
        $this->assertEquals('foo', $test->getSurname());

    }
    public function testAddComment(){
        $test = new Entity\Comment();
        $test->setActivityId(5);
        $test->setDescription('test');
        $test->setUserId(5);
        $this->assertEquals('test', $test->getDescription());
    }
    public function testAddProduct(){
        $test = new Entity\Product();
        $test->setName('clock');
        $test->setDescription('test');
        $test->setPrice(20);
        $this->assertEquals(20, $test->getPrice());
    }
    public function testAddTokenApi(){
        $test = new Entity\TokenApi();
        $test->setToken('azerty');
        $test->setPermission(['Basic']);
        $test->setUserId(20);
        $this->assertEquals('azerty', $test->getToken());
    }

}
?>