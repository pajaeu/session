<?php

use Pajaeu\Session\Flash;
use Pajaeu\Session\Session;
use PHPUnit\Framework\TestCase;

class FlashTest extends TestCase
{

    public function testSetAndGetFlashMessage()
    {
        Session::start();

        $message = 'Test Flash Message';

        Flash::set('success', $message);

        $flashes = Flash::get();

        $this->assertCount(1, $flashes);
        $this->assertEquals('success', $flashes[0]->getType());
        $this->assertEquals($message, $flashes[0]->getMessage());
    }

    public function testMultipleFlashMessages()
    {
        Session::start();

        $message1 = 'Message 1';
        $message2 = 'Message 2';

        Flash::set('success', $message1);
        Flash::set('error', $message2);

        $flashes = Flash::get();

        $this->assertCount(2, $flashes);

        $this->assertEquals('success', $flashes[0]->getType());
        $this->assertEquals($message1, $flashes[0]->getMessage());

        $this->assertEquals('error', $flashes[1]->getType());
        $this->assertEquals($message2, $flashes[1]->getMessage());
    }

    public function testGetEmptyFlashMessages()
    {
        Session::start();

        $flashes = Flash::get();

        $this->assertEmpty($flashes);
    }
}
