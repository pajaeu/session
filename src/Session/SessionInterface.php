<?php

namespace Pajaeu\Session;

interface SessionInterface
{

    /**
     * @return void
     */
    public static function start(): void;

    /**
     * @return false|string
     */
    public static function id(): false|string;

    /**
     * @return int
     */
    public static function status(): int;

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key): mixed;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set(string $key, mixed $value): void;

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function put(string $key, mixed $value): void;

    /**
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool;

    /**
     * @param string $key
     * @return void
     */
    public static function remove(string $key): void;

    /**
     * @return void
     */
    public static function regenerate(): void;

    /**
     * @return void
     */
    public static function clear(): void;
}