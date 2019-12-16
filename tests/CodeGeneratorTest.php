<?php

// declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Pirey\CodeGenerator;

final class CodeGeneratorTest extends TestCase
{
    public function testMakeCode()
    {
        $expected = 'INV0000001';
        $actual = CodeGenerator::make(1, 'INV');

        $this->assertEquals($expected, $actual);
    }

    public function testMakeCodeWithLen()
    {
        $expected = 'INV000000001';
        $actual = CodeGenerator::make(1, 'INV', 12);
        $this->assertEquals($expected, $actual);

        $expected = 'INV001';
        $actual = CodeGenerator::make(1, 'INV', 6);
        $this->assertEquals($expected, $actual);
    }

    public function testFirstCode()
    {
        $expected = 'INV0000000';
        $actual = CodeGenerator::first('INV');
        $this->assertEquals($expected, $actual);

        // alias for 'first'
        $expected = 'INV0000000';
        $actual = CodeGenerator::initial('INV');
        $this->assertEquals($expected, $actual);
    }

    public function testFirstCodeWithLen()
    {
        $expected = 'INV000000000';
        $actual = CodeGenerator::first('INV', 12);
        $this->assertEquals($expected, $actual);

        $expected = 'INV000';
        $actual = CodeGenerator::first('INV', 6);
        $this->assertEquals($expected, $actual);
    }

    public function testNext()
    {
        $expected = 'INV0000001';
        $actual = CodeGenerator::next('INV0000000', 'INV');
        $this->assertEquals($expected, $actual);

        $expected = 'INV0000104';
        $actual = CodeGenerator::next('INV0000103', 'INV');
        $this->assertEquals($expected, $actual);

        $expected = 'INV1000104';
        $actual = CodeGenerator::next('INV1000103', 'INV');
        $this->assertEquals($expected, $actual);
    }

    public function testNextWithLen()
    {
        $expected = 'INV000000001';
        $actual = CodeGenerator::next('INV000000000', 'INV', 12);
        $this->assertEquals($expected, $actual);

        $expected = 'INV001';
        $actual = CodeGenerator::next('INV000', 'INV', 6);
        $this->assertEquals($expected, $actual);
    }

    public function testNextWithCustomCode()
    {
        $this->expectException(InvalidArgumentException::class);

        CodeGenerator::next('xf861000ABC', 'INV');
    }
}
