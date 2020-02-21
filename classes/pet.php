<?php

class Pet
{
    private $_name;
    private $_color;
    private $_type;

    function __construct($type="?",$name="unknown",$color="?"){
        $this->_name = $name;
        $this->_color = $color;
        $this->_type =  $type;
    }

    function eat()
    {
        echo $this->_name." is eating<br>";
    }

    function getName()
    {
        return $this->_name;
    }

    function setName($name)
    {
        $this->_name = $name;
    }

    function setColor($color)
    {
        $this->_color = $color;
    }

    function getColor()
    {
        return $this->_color;
    }

    function setType($type)
    {
        $this->_type = $type;
    }

    function getType()
    {
        return $this->_type;
    }

    function talk()
    {
        echo $this->_name." is talking<br>";
    }
}