<?php

class Member extends SelfValidatingModel
{
    protected $fillable = array('email', 'password', 'name', 'introduction', 'phone', 'antecedent', 'type');
    protected $hidden = array('password', 'remember_token');
    protected static $rules = array(
        'email' => 'required|email|unique:members',
        'password' => 'required',
        'name' => 'required',
        'type' => 'required|in:0,1,2',
    );
}