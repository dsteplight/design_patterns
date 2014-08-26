<?php
//define namespace
namespace dp\creational\singleton; 

class God
{
    /**
     * @var _my_god
     */
    protected static $_my_god = null;

    protected function __construct()
    {
       // You can not create a god. There is only one god. You must call on him/her.
    }

    /**
     * Retrieve an instance of the given class.
     *
     * @return _my_god
     */
    public static function getInstance()
    {
        //using late static binding
        if (!isset(static::$_my_god)) {
            static::$_my_god = new static;
        }
        return static::$_my_god;
    }

    protected function __clone()
    {
        echo "You can not clone God. He is  all powerful and all knowing. Do you reall think God can create something as powerful and knowledgable as himself/herself? Actually, this won't kick in because you won't beable to create a GOd Object to clone int he first place.";
    }
}

//Client Code
God::getInstance();
//clone new God; //uncomment this line and watch what happens
