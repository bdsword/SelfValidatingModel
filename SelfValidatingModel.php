<?php

class SelfValidatingModel extends Eloquent
{
    protected static $rules = array();
    protected $errors;

    public function save(array $options = array())
    {
        $validator = null;
        if($this->exists==false) //Creating
            $validator = Validator::make($this->attributes, static::$rules);
        else{ //Updating
            $dirty = $this->getDirty(); //Get dirty field
            $dirtyRule = array_only(static::$rules, array_keys($dirty)); //Retrieve the rules for the dirty field
            $validator = Validator::make($dirty, $dirtyRule); //Validating
        }
        if( $validator->fails() ){
            $this->errors = $validator->errors();
            throw new ValidateFailedException();
        }
        return parent::save($options);
    }

    /*
     * @return \Illuminate\Support\MessageBad
     */
    public function getErrors()
    {
        return $this->errors;
    }
}