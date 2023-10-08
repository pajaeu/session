<?php

namespace Pajaeu\Session;

class Flash
{

    private const KEY = '_flashes';

    public function __construct(
        private readonly string $type,
        private readonly string $message
    )
    {
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return void
     */
    public static function success(string $message): void
    {
        self::set('success', $message);
    }

    /**
     * @param string $message
     * @return void
     */
    public static function error(string $message): void
    {
        self::set('error', $message);
    }

    /**
     * @param string $message
     * @return void
     */
    public static function warning(string $message): void
    {
        self::set('warning', $message);
    }

    /**
     * @param string $message
     * @return void
     */
    public static function info(string $message): void
    {
        self::set('info', $message);
    }

    /**
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function set(string $type, string $message): void
    {
        Session::put(self::KEY, new self($type, $message));
    }

    /**
     * @return array
     */
    public static function get(): array
    {
        if (!Session::has(self::KEY)) {
            return [];
        }

        $flashes = Session::get(self::KEY);

        Session::remove(self::KEY);

        return $flashes;
    }
}