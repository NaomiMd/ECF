<?php


class Hour
{
    private $id;
    private $opening_morning;
    private $closing_morning;
    private $opening_night;
    private $closing_night;


    public function __construct(array $data)
    {
             $this->hydrate($data);
        
    }
    
    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
              // On appelle le setter
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
     * Get the value of opening_morning
     */ 
    public function getOpening_morning()
    {
        return $this->opening_morning;
    }

    /**
     * Set the value of opening_morning
     *
     * @return  self
     */ 
    public function setOpening_morning($opening_morning)
    {
        $this->opening_morning = $opening_morning;

        return $this;
    }

    /**
     * Get the value of closing_morning
     */ 
    public function getClosing_morning()
    {
        return $this->closing_morning;
    }

    /**
     * Set the value of closing_morning
     *
     * @return  self
     */ 
    public function setClosing_morning($closing_morning)
    {
        $this->closing_morning = $closing_morning;

        return $this;
    }

    /**
     * Get the value of opening_night
     */ 
    public function getOpening_night()
    {
        return $this->opening_night;
    }

    /**
     * Set the value of opening_night
     *
     * @return  self
     */ 
    public function setOpening_night($opening_night)
    {
        $this->opening_night = $opening_night;

        return $this;
    }

    /**
     * Get the value of closing_night
     */ 
    public function getClosing_night()
    {
        return $this->closing_night;
    }

    /**
     * Set the value of closing_night
     *
     * @return  self
     */ 
    public function setClosing_night($closing_night)
    {
        $this->closing_night = $closing_night;

        return $this;
    }
}