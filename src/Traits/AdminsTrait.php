<?php

namespace Bot\Traits;

trait AdminsTrait
{
    private $admins = [
        211021342,
        196716767
    ];

    protected $accessDeniesMessage = "Колбосятина тебя не любит :с";

    private function isAdmin(int $userId) :bool
    {
       return in_array($userId, $this->admins);
    }
}