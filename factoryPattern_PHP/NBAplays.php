<?php
 // Patron de Diseño Factory Method

 /*El ejercicio muestra como seria la distribucion de los jugadores
  dependiendo la jugada que se planea realizar*/

abstract class AbstractFactoryMethod{
    abstract function makePHPPlay($param);
}

class HighRoleFactoryMethod extends AbstractFactoryMethod{
private $context = "HighRole";
function makePHPPlay($param){
    $play = NULL;

    switch($param){
        case "us":
            $play = new HighRolePHPPlay;
        break;
        case "other":
            $play = new LowRolePHPPlay;
        break;
        default:
            $play = new HighRolePHPPlay;
        break;
    }
    return $play;
}
}

class LowRoleFactoryMethod extends AbstractFactoryMethod{
    private $context = "LowRole";
    function makePHPPlay($param)
    {
        $play = NULL;
        switch($param){
            case "us":
                $play = new LowRolePHPPlay;
            break;
            case "other":
                $play = new HighRolePHPPlay;
            break;
            case "otherother":
                $play = new VisualQuickstartPHPPlay;
            break;
            default:
                $play =new LowRolePHPPlay;
             break;


        }
        return $play;
    }
}

abstract class AbstractPlay{
    abstract function getPlaymaker();
    abstract function getRoles();

}

abstract class AbstractPHPPlay{
    private $subject = "PHP";
}

class HighRolePHPPlay extends AbstractPHPPlay{
    private $Playmaker;
    private $Roles;
    private static $LongOrShort = 'short';
    function __construct(){
        //alternativa entre Jugadas
        if ('short' == self::$LongOrShort){
            $this->Playmaker = 'Lebron James';
            $this->Roles = 'Anthony Davis, Kyle Kuzma, Dwite Howard and Javal Mcgee';
            self::$LongOrShort = 'short';
        }else{
            $this->Playmaker = 'Lebron James';
            $this->Roles = 'Anthony Davis, Kyle Kuzma, Kcp and Javal Mcgee';
            self::$LongOrShort = 'short';
        }
    }
    function getPlaymaker(){return $this->Playmaker;}
    function getRoles(){return $this->Roles;}
    
}
class LowRolePHPPlay extends AbstractPHPPlay {
    private $Playmaker;
    private $Roles;
    function __construct() {
        //alternativa randomly entre Jugadas
        mt_srand((double)microtime()*10000000);
        $rand_num = mt_rand(0,1);      
 
        if (1 > $rand_num) {
            $this->Playmaker= 'Rajon Rondon';
            $this->Roles  = 'Kcp, Alex Caruso, Kyle Kuzma, Dwite Howard';
        } else {
            $this->author = 'Quin Cook';
            $this->title  = 'JR Smith, Alex Caruso, Jaren Dublen, Dwite Howard'; 
        }  
    }
        function getPlaymaker(){return $this->Playmaker;}
        function getRoles(){return $this->Roles;}
    }

    class VisualQuickstartPHPPlay extends AbstractPHPPlay{
        private $Playmaker;
        private $Roles;
        function __construct()
        {
            $this->Playmaker = 'Lebron James';
            $this->Roles = 'Anthony Davis, Kyle Kuzma, Kcp and Javal Mcgee';
        }
        function getPlaymaker(){return $this->Playmaker;}
        function getRoles(){return $this->Roles;}
        
    }

    writeln(' COMENZAR FACTORY METHOD PATTERN');
    writeln('');

    writeln('Probando HighRoleFactoryMethod');
    $factoryMethodInstance = new HighRoleFactoryMethod;
    testFactoryMethod($factoryMethodInstance);
    writeln('');

    writeln('Probando LowRoleFactoryMethod');
    $factoryMethodInstance = new LowRoleFactoryMethod;
    testFactoryMethod($factoryMethodInstance);
    writeln('');

    writeln('FIN FACTORY METHOD PATTERN');
    writeln('');

    function testFactoryMethod($factoryMethodInstance) {
        $playUs = $factoryMethodInstance->makePHPPlay("us");
        writeln('Main Play Playmaker: '.$playUs->getPlaymaker());
        writeln('Main Play Roles: '.$playUs->getRoles());

        $playUs = $factoryMethodInstance->makePHPPlay("other");
        writeln('Other Play Playmaker: '.$playUs->getPlaymaker());
        writeln('Other Play Roles: '.$playUs->getRoles());

        $playUs = $factoryMethodInstance->makePHPPlay("otherother");
        writeln('Long Play Playmaker: '.$playUs->getPlaymaker());
        writeln('Long Play Roles: '.$playUs->getRoles());
    }
    function writeln($line_in) {
        echo $line_in."<br/>";
      }
    ?>