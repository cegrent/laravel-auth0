<?php

namespace Auth0\Login;

use Auth0\Login\Traits\Auth0UserTrait;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * This class represents a generic user initialized with the user information
 * given by Auth0 and provides a way to access to the decoded JWT data.
 */
class Auth0JWTUser implements Authenticatable
{

    use Auth0UserTrait;

    /**
     * Auth0JWTUser constructor.
     *
     * @param array $userInfo
     */
    public function __construct(array $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return string|null
     */
    public function getAuthIdentifierName()
    {
        return $this->userInfo['sub'] ?? null;
    }

    /**
     * Get the password for the user.
     *
     * @return null
     */
    public function getAuthPassword()
    {
        return null;
    }
}
