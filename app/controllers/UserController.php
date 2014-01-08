<?php

class UserController extends BaseController
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $this->user->all();
    }

} 