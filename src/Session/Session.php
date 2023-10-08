<?php

namespace Pajaeu\Session;

class Session implements SessionInterface
{

    /**
     * @return void
     */
    public static function start(): void
    {
        session_start();
    }

    /**
     * @return false|string
     */
    public static function id(): false|string
    {
        return session_id();
    }

    /**
     * @return int
     */
    public static function status(): int
    {
        return session_status();
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public static function get(?string $key = null): mixed
    {
        if (is_null($key)) {
            return $_SESSION;
        }

        return $_SESSION[$key] ?? null;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function put(string $key, mixed $value): void
    {
        $_SESSION[$key][] = $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * @param string $key
     * @return void
     */
    public static function remove(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * @return void
     */
    public static function regenerate(): void
    {
        session_regenerate_id();
    }

    /**
     * @return void
     */
    public static function clear(): void
    {
        session_unset();
    }
}