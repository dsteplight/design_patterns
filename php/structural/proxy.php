<?php
namespace dp\structural\proxy; 

/**
* @todo Change code so the Native asks a question to the Translator that only the Foreigner knows but has to do some work to find out. Lastly use  an interface class so future specifice language classes can implement.
*/

class Foreigner {
    public function __construct() {
    }

    public function getNativeTranslation( $question ) {

        /*
        ** Do work to trnslate $question into Brazlian Portuguese...
        */
        return "Como falo seu nome?";
    }

    public function askNative(Native $native) {
         /*
         ** Do work behind the scenes to recogize languge
         */
        $this->question = $native->getQuestion(); 
        return $this->getNativeTranslation( $this->question );
    }
}

class ProxyForeigner {
    function __construct() {
    }

    public function askNative( Native $native ) {
        //in theory the ProxyForeigner should translate the Native's question into 
        //a manner that the Foreigner can understand to keep this native-translator-foreigner example more realistic. 
        //The native should never talk directly too the foreigner  because it will take too much resources and time to communicate. 
        //For now we are just passing the Native object along.
        if (null == $this->foreigner) {
            $this->makeForeigner(); 
        }
        return $this->foreigner->askNative($native);
    }  

    //create Foreigner 
    public function makeForeigner() {
        $this->foreigner = new Foreigner();
    }
}

class Native {
    /**
     * @var foreign_language
     */
    private $foreign_language;
    /**
     * @var question
     */
    private $question;
    function __construct($question, $foreign_language) {
      $this->foreign_language = $foreign_language;
      $this->question  = $question;
    }
    public function getQuestion() {
        return $this->question;
    }
    public function getForeignLanguage() {
        return $this->foreign_language;
    }
}

  //client code 
  $proxyForeigner = new ProxyForeigner(); //A symbolic translator. This person listens to the native speaker and talks to the foreign speaker  speaker directly
  $nativeSpeaker = new Native('How do I say your name?','bp');//A symbolic native speaker

  echo $proxyForeigner->askNative($nativeSpeaker);
 
