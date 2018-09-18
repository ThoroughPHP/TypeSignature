<?php

namespace TypeSignature\Test;

use PHPUnit\Framework\TestCase;
use TypeSignature\TypeSignature;

final class TypeSignatureTest extends TestCase
{
    public function testArguments(): void
    {
        $this->assertSame('string, integer', TypeSignature::arguments('string', 'integer'));
    }

    public function testBoolean(): void
    {
        $this->assertSame('bool', TypeSignature::boolean());
    }

    public function testInteger(): void
    {
        $this->assertSame('integer', TypeSignature::integer());
    }

    public function testFloat(): void
    {
        $this->assertSame('float|double', TypeSignature::float());
    }

    public function testDouble(): void
    {
        $this->assertSame('float|double', TypeSignature::double());
    }

    public function testString(): void
    {
        $this->assertSame('string', TypeSignature::string());
    }

    public function testArray(): void
    {
        $this->assertSame('string[]', TypeSignature::array('string'));
        $this->assertSame('string[]', TypeSignature::array(TypeSignature::array('string')));
    }

    public function testObject(): void
    {
        $this->assertSame('object', TypeSignature::object());
    }

    public function testCallable(): void
    {
        $this->assertSame('callable', TypeSignature::callable());
    }

    public function testMixed(): void
    {
        $this->assertSame('mixed', TypeSignature::mixed());
    }

    public function testNumber(): void
    {
        $this->assertSame('integer|float|double', TypeSignature::number());
    }

    public function testCallback(): void
    {
        $this->assertSame('callable', TypeSignature::callback());
    }

    public function testUnion(): void
    {
        $this->assertSame('integer|string', TypeSignature::union(TypeSignature::integer(), TypeSignature::string()));
    }

    public function testIntersection(): void
    {
        $this->assertSame('ArrayAccess&Countable', TypeSignature::intersection(\ArrayAccess::class, \Countable::class));
    }

    public function testOptional(): void
    {
        $this->assertSame('?string', TypeSignature::optional(TypeSignature::string()));
        $this->assertSame('?string', TypeSignature::optional(TypeSignature::optional(TypeSignature::string())));
    }
}