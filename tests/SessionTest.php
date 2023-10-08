<?php

use Pajaeu\Session\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{

    public function testStartSession()
    {
        Session::start();

        $this->assertTrue(Session::status() === PHP_SESSION_ACTIVE);
    }

    public function testSetAndGetSession()
    {
        Session::start();

        $key = 'test_key';
        $value = 'test_value';

        Session::set($key, $value);

        $result = Session::get($key);

        $this->assertEquals($value, $result);
    }

    public function testRemoveSession()
    {
        Session::start();

        $key = 'test_key';
        $value = 'test_value';

        Session::set($key, $value);

        Session::remove($key);

        $result = Session::get($key);

        $this->assertNull($result);
    }

    public function testRegenerateSessionId()
    {
        Session::start();

        $oldSessionId = Session::id();

        Session::regenerate();

        $newSessionId = Session::id();

        $this->assertNotEquals($oldSessionId, $newSessionId);
    }

    public function testClearSession()
    {
        Session::start();

        $key = 'test_key';
        $value = 'test_value';

        Session::set($key, $value);

        Session::clear();

        $result = Session::get($key);

        $this->assertNull($result);
    }
}
