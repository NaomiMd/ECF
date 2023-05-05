<?php

class Table
{
    private $id;
    private $limited_seats;

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
     * Get the value of limited_seats
     */ 
    public function getLimited_seats()
    {
        return $this->limited_seats;
    }

    /**
     * Set the value of limited_seats
     *
     * @return  self
     */ 
    public function setLimited_seats($limited_seats)
    {
        if($limited_seats > 50){
            echo 'Impossible de réserver';
        }
        $this->limited_seats = $limited_seats;

        return $this;
    }
}