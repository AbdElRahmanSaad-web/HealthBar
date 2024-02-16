<?php

namespace App\RepositoryInterface;

interface AuthRepositoryInterface{
    public function login($credentials);

    public function logout();

    // public function dashboardHome();
}