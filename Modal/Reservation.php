<?php

class Reservation
{
    private $id;
    private $date;
    private $hour;
    private $number_of_guest;
    private $name;
    private $email;
    private $allergy;
    private $user_id;
    private $table_id;

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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of hour
     */ 
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set the value of hour
     *
     * @return  self
     */ 
    public function setHour($hour)
    {
        $this->hour = $hour;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of table_id
     */ 
    public function getTable_id()
    {
        return $this->table_id;
    }

    /**
     * Set the value of table_id
     *
     * @return  self
     */ 
    public function setTable_id($table_id)
    {
        $this->table_id = $table_id;

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
}