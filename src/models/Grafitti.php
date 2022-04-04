<?php

class Grafitti
{
    private $notifierEmail;
    private $id_property;
    private $location;
    private $photo;
    private $findingDate;
    private $type;
    private $remarks;

    public function __construct($notifierEmail, $id_property, $location, $photo, $findingDate, $type, $remarks)
    {
        $this->notifierEmail = $notifierEmail;
        $this->id_property = $id_property;
        $this->location = $location;
        $this->photo = $photo;
        $this->findingDate = $findingDate;
        $this->type = $type;
        $this->remarks = $remarks;
    }

    public function getNotifierEmail(){
        return $this->notifierEmail;
    }

    public function getIdProperty(){
        return $this->id_property;
    }

    public function getLocation(){
        return $this->location;
    }


    public function getPhoto(){
        return $this->photo;
    }


    public function getFindingDate(){
        return $this->findingDate;
    }

    public function getType(){
        return $this->type;
    }

    public function getRemarks(){
        return $this->remarks;
    }
}
