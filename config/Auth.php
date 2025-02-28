<?php

class Auth
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public function getUser()
    {
        return $_SESSION['user'] ?? null;
    }

    public function hasRole($role)
    {
        $user = $this->getUser();
        return $user && isset($user['role']) && $user['role'] === $role;
    }

    public function hasAnyRole($roles)
    {
        if (!is_array($roles)) {
            $roles = [$roles];
        }

        $user = $this->getUser();
        return $user && isset($user['role']) && in_array($user['role'], $roles);
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    public function requireAuth()
    {
        if (!$this->isAuthenticated()) {
            $this->redirect('index.php?module=login');
        }
    }

    public function requireRole($roles)
    {
        $this->requireAuth();
        if (!$this->hasAnyRole($roles)) {
            $this->redirect('/unauthorized.php');
        }
    }

    public function getCsrfToken()
    {
        return $_SESSION['csrf_token'];
    }

    public function verifyCsrfToken($token)
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}