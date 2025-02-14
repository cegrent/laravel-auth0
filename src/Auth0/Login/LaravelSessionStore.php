<?php

namespace Auth0\Login;

use Auth0\SDK\Store\StoreInterface;

class LaravelSessionStore implements StoreInterface
{
    const BASE_NAME = 'auth0_';

    /**
     * Persists $value on $_SESSION, identified by $key.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set(string $key, $value)
    {
        $key_name = $this->getSessionKeyName($key);

        \session([$key_name => $value]);
    }

    /**
     * @param $key
     * @param null $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        $key_name = $this->getSessionKeyName($key);

        return \session($key_name, $default);
    }

    /**
     * Removes a persisted value identified by $key.
     *
     * @param string $key
     */
    public function delete(string $key)
    {
        $key_name = $this->getSessionKeyName($key);

        \session([$key_name => null]);
    }

    /**
     * Constructs a session var name.
     *
     * @param string $key
     *
     * @return string
     */
    public function getSessionKeyName($key)
    {
        return self::BASE_NAME.'_'.$key;
    }
}
