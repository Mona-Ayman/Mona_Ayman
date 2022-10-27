<?php
namespace APP\HTTP;

use APP\DB\Models\Model;

class Validation{
    private $value; //mona
    private $inputname;  //first_name
    public array $errors = [];
    private array $restrictedValues = [
        null,'',[],
    ];
    private array $file;
    public function required():self{
        if(in_array($this->value,$this->restrictedValues)){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " is required";
        }
        return $this;
    }
    public function string():self{
        if(gettype($this->value) !== "string"){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " must be string";
        }
        return $this;
    }
    public function between(int $min,int $max):self{
        if(!(strlen($this->value) >= $min && strlen($this->value) <= $max)){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " must be between " . $min . " and " . $max;
        }
        return $this;
    }
    public function confirmed(string $verification_password):self{
        if($this->value !== $verification_password){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " is not confirmed";
        }
        return $this;
    }
    public function regex(string $pattern,$message = null) :self{
        if(! preg_match($pattern,$this->value)){
            $this->errors[$this->inputname][__FUNCTION__] = $message ?? $this->inputname . " is invalid";
        }
        return $this;
    }
    public function unique($table,$column):self{
        $query = "SELECT * FROM {$table} WHERE {$column} = ? ";
        $model = new Model;
        $stmt = $model->con->prepare($query);
        if(!$stmt){
            $this->errors[$this->inputname][__FUNCTION__] = " Something Went Wrong";
        }
        $stmt->bind_param("s",$this->value);
        $stmt->execute();
        if($stmt->get_result()->num_rows == 1){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " is already exists";
        }
        return $this;
    }
    public function in(array $values):self{
        if(! in_array($this->value,$values)){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " must be " . implode(',',$values) ;
        }
        return $this;
    }
    public function numeric():self{
        if(! is_numeric($this->value)){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " must be number" ;
        }
        return $this;
    }
    public function numOfDigits($digits):self{
        if(strlen($this->value) !== $digits){
            $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " must be " . $digits . " digits" ;
        }
        return $this;
    }
    public function exist($table,$column):self{
       $query = "SELECT * FROM {$table} WHERE {$column} = ?";
       $model = new Model;
       $stmt = $model->con->prepare($query); 
       if(! $stmt){
        $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " Something Went Wrong" ;
       }
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        if($stmt->get_result()->num_rows == 0){
           $this->errors[$this->inputname][__FUNCTION__] = $this->inputname . " Not Exist" ;
        }
        return $this;
       
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the value of inputname
     *
     * @return  self
     */ 
    public function setInputname($inputname)
    {
        $this->inputname = $inputname;

        return $this;
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    public function getError(string $inputname) :? string
    {
        if(isset($this->errors[$inputname])){
            foreach($this->errors[$inputname] as $error){
                return $error;
            }
        }
        return null;
    }
    public function getErrorPrag(string $inputname) : string{
        return "<p class='text text-danger'>" . $this->getError($inputname) . "</p>";
    }
    public function size(int $maxSize) :self
    {
        if($this->file['size'] > $maxSize){
            $this->errors[$this->inputName][__FUNCTION__] = "Max Size : {$maxSize} Bytes";
        }
        return $this;
    }
    public function extensions(array $availableExtensions) :self
    {
        $fileExtension = explode('/',$this->file['type'])[1]; //png
        if(! in_array($fileExtension,$availableExtensions)){
            $this->errors[$this->inputName][__FUNCTION__] = "Allowed Extensions are:" . implode(', ' ,$availableExtensions);
        }
        return $this;
    }


    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}