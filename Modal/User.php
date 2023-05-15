<?php

class User
{
    private $id;
    private $email;
    private $password;
    private $allergy;
    private $number_of_guest;
    private $role;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        if(strlen($password) < 8)
        {
            echo 'Votre mot de passe doit être composé de 8 characters';
        }
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of allergy
     */ 
    public function getAllergy()
    {
        return $this->allergy;
    }

    /**
     * Set the value of allergy
     *
     * @return  self
     */ 
    public function setAllergy($allergy)
    {
        $this->allergy = $allergy;

        return $this;
    }

    /**
     * Get the value of number_of_guest
     */ 
    public function getNumber_of_guest()
    {
        return $this->number_of_guest;
    }

    /**
     * Set the value of number_of_guest
     *
     * @return  self
     */ 
    public function setNumber_of_guest($number_of_guest)
    {
        $this->number_of_guest = $number_of_guest;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}