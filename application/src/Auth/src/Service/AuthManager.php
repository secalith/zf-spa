<?php

namespace Auth\Service;

class AuthManager
{
    public function __construct($authStorage, $authAdapter,$authService)
    {
        $this->authStorage = $authStorage;
        $this->authAdapter = $authAdapter;
        $this->authService = $authService;
    }

    /**
     * Performs a login attempt. If $rememberMe argument is true, it forces the session
     * to last for one month (otherwise the session expires on one hour).
     */
    public function login($email, $password, $rememberMe)
    {
        // Check if user has already logged in. If so, do not allow to log in
        // twice.
        if ($this->authService->getIdentity()!=null) {
            throw new \Exception('Already logged in');
        }
        // Authenticate with login/password.
        $this->authService->getAdapter()
            ->setEmail($email)
            ->setCredentials($password);#
        var_dump($this->authService);
        $result = $this->authService->authenticate();
var_dump($result);
        if ($result->getCode()==Result::SUCCESS && $rememberMe) {
            // Session cookie will expire in 1 month (30 days).
            $this->sessionManager->rememberMe(60*60*24*30);
        }

        return $result;
    }

    /**
     * Performs user logout.
     */
    public function logout()
    {
        // Allow to log out only when user is logged in.
        if ($this->authService->getIdentity()==null) {
            throw new \Exception('The user is not logged in');
        }

        // Remove identity from session.
        $this->authService->clearIdentity();
    }
}