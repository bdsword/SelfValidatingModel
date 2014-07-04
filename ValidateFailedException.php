<?php
/**
 * Created by PhpStorm.
 * User: bdsword
 * Date: 7/4/14
 * Time: 12:31 AM
 */

class ValidateFailedException extends Exception{
    public function  __construct()
    {
        $this->message = 'Model validate failed.';
    }
} 