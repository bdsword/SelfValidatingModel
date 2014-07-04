SelfValidatingModel
==========

A very simple implementation of self validation model for Laravel Eloquent.

How to use?
==========
Just download the php files, and put them under your app/models/, or somewhere you can easily access. Extends SelfValidatingModel, and set rules for validating. Feel free to use any rule listed in [Laravel official website](http://laravel.com/docs/validation#available-validation-rules) .


Example
--------------
     ```php
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
    ```
