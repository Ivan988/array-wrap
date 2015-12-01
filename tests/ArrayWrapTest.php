<?php

namespace Tests;

use Ivan988\ArrayWrap;

class ArrayWrapTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $name = $arrayWrap->get('name');

        $this->assertEquals('some name', $name);
    }

    public function testGetNumericArray()
    {
        $arrayWrap = new ArrayWrap([1, 3, 5]);

        $number = $arrayWrap->get(2);

        $this->assertEquals(5, $number);
    }

    public function testGetMissingKey()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $city = $arrayWrap->get('city');

        $this->assertNull($city);
    }

    public function testGetOrFail()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $name = $arrayWrap->getOrFail('name');

        $this->assertEquals('some name', $name);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Key "city" is not set
     */
    public function testGetOrFailMissingKey()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap->getOrFail('city');
    }

    public function testSet()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap->set('city', 'some city');

        $city = $arrayWrap->get('city');
        $this->assertEquals('some city', $city);
    }

    public function testSetUpdate()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap->set('name', 'some other name');

        $otherName = $arrayWrap->get('name');
        $this->assertEquals('some other name', $otherName);
    }

    public function testSetNull()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap->set('name');

        $otherName = $arrayWrap->get('name');
        $this->assertNull($otherName);
    }

    public function testChainedSet()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap
            ->set('city', 'some city')
            ->set('name');

        $name = $arrayWrap->get('name');
        $city = $arrayWrap->get('city');

        $this->assertNull($name);
        $this->assertEquals('some city', $city);
    }

    public function testAdd()
    {
        $arrayWrap = new ArrayWrap([
            1, 3, 5,
        ]);

        $arrayWrap->add('asdf')->add(3);

        $number = $arrayWrap->get(4);
        $this->assertEquals(3, $number);
    }

    public function testAddAssociativeArray()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap
            ->add('some city')
            ->add('some country');

        $city = $arrayWrap->get(0);
        $country = $arrayWrap->get(1);
        $this->assertEquals('some city', $city);
        $this->assertEquals('some country', $country);
    }

    public function testRemove()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap->remove('name');

        $name = $arrayWrap->get('name');
        $this->assertNull($name);

        $surname = $arrayWrap->get('surname');
        $this->assertEquals('some surname', $surname);
    }

    public function testRemoveMissingKey()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap->remove('city');
    }

    public function testCount()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $count = $arrayWrap->count();
        $this->assertEquals(2, $count);
    }

    public function testCountAfterAddAndRemove()
    {
        $arrayWrap = new ArrayWrap([
            'name' => 'some name',
            'surname' => 'some surname',
        ]);

        $arrayWrap
            ->remove('name')
            ->add('city', 'some city')
            ->add('country', 'some country');

        $count = $arrayWrap->count();
        $this->assertEquals(3, $count);
    }

    public function testToArray()
    {
        $array = [1, 2, 3];
        $arrayWrap = new ArrayWrap($array);

        $returnedArray = $arrayWrap->toArray();

        $this->assertEquals($array, $returnedArray);
    }
}
