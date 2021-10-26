<?php 
 
class Computer {
    //ATTRIBUTES
    public $cpu; //%
    public $storage; //shows the storage usage
    public $memory; //%
    public $connection; //goes connected and disconnected
    public $gpu; //%
    public $program; //open(execute) and close
    //---------------------------------------
    public $isOn; //computer goes on and off
    public $progStatus;
    public $networkStatus;
    //---------------------------------------
    public $user;
    public $password;
    public $lock;

    //METHODS/FUNCTIONS 
    /*NOTES: If the computer is off, no function is going to work, the same will happen if the user is not logged in (these two validations appear in almost all functions)
        Eg: Turned_On_Validation {
                Login_Validation {
                    Function_Content 
                }
            }
    */
    public function __construct($cpu, $storage, $memory, $network, $gpu, $program, $status, $user, $password) { 

        $this->cpu = $cpu;

        $this->gpu = $gpu;

        $this->storage = $storage;

        $this->memory = $memory;

        $this->network = $network;
    
        $this->program = $program;

        $this->isOn = $status;

        $this->progStatus = $progStatus = false;

        $this->networkStatus = $networkStatus = false;

        $this->user = $user;

        $this->password = $password;

        $this->lock = $lock = false;


    }

    public function turnOn() {
        if ($this->isOn == false) {
            $this->isOn = true;
            echo "The computer is ON</p>";
        }
    }
    public function turnOff() {
        if ($this->isOn == true) {
            
            $this->isOn = false;
            echo "The computer is OFF</p>";
        }
    }
    public function progList() {
        if ($this->isOn == true) {
            
            if($this->lock == true) {
                echo "Programs:</p> {$this->program[0]}</br> {$this->program[1]}</br> {$this->program[2]}</br></p>";
            }
            else { 
                echo "You are not logged-in</p>";
            }
        }
    }
    public function execute($progKey) {
        if ($this->isOn == true) {
            if($this->lock == true) {
                if ($this->progStatus == false) {
            
                    $cpuProc = rand(12, 30);
                    $gpuProc = rand(12, 30);
                    $memoryProc = rand(500, 600);
            
                    switch($progKey) {
                            
                            case 0:
                                echo "<h1 style='text-align: center;'>Word is open</h1></p> <div style='margin-left: 10%;'><textarea style='width:90%; resize:none;' rows='40%' id='fcont' name='fcont'></textarea>";
                                $this->progStatus = true;
                                    
                                if($progStatus = true) {
                                    $this->cpu += $cpuProc;
                                    $this->gpu += $gpuProc;
                                    $this->memory -= $memoryProc;

                                    return $cpuProc;  $gpuProc;  $memoryProc;
                                }
                            break;
                            
                            case 1:
                                echo "<h1 style='text-align: center;'>Excel is open</h1></p>";
                                $this->progStatus = true;
                                    
                                if($progStatus = true) {
                                    $this->cpu += $cpuProc;
                                    $this->gpu += $gpuProc;
                                    $this->memory -= $memoryProc;

                                    return $cpuProc; $gpuProc; $memoryProc;
                                }
                            break;

                            case 2:
                                echo "<h1 style='text-align: center;'>PowerPoint is open</h1></p>";
                                $this->progStatus = true;
                                    
                                if($progStatus = true) {
                                    $this->cpu += $cpuProc;
                                    $this->gpu += $gpuProc;
                                    $this->memory -= $memoryProc;

                                    return $cpuProc; $gpuProc; $memoryProc;
                                }
                            break;

                            default:
                                echo "<h1 style='text-align: center;'>Program Not Found!</h1></p>";   
                    
                    }//Switch end
                }//Prog Status IF
                else {
                    echo "<h1 style='text-align: center;'>There is a program in execution! Please, close it to open another one.</h1></p>";
                }
            }//Lock/Login IF
            else {
                echo "You are not logged-in</p>";
            }
        }//isOn Validation IF
        
    }
    public function connect($net_W_Key) {
        if ($this->isOn == true) {
            
            if($this->lock == true) {
        
                if ($this->networkStatus == false) {
            
                    switch($net_W_Key) {
                        
                        case 0:
                            echo "<h1 style='text-align: center;'>You Are Connected to Wifi-Unimar</h1></p>";
                        
                            $this->networkStatus = true;
                            
                        break;
                        
                        case 1:
                            echo "<h1 style='text-align: center;'>You Are Connected to AndroiAP</h1</p>";
                            
                            $this->networkStatus = true;
                            
                        break;

                        case 2:
                            echo "<h1 style='text-align: center;'>You Are Connected to TP-WIFI</h1></p>";
                            
                            $this->networkStatus = true;

                        break;

                        default:
                            echo "<h1 style='text-align: center;'>No Conection!</h1></p>";   
                            
                    }
                }
                else {
                    echo "You are already connected to a network";
                }
            }
            else {
                echo "You are not logged-in</p>";
            }
        }
    }
    public function close() {
        
        if ($this->isOn == true) {
            
            if($this->lock == true) {
                $this->progStatus = false;
                echo "Program Closed";
            }    
            else { 
                echo "You are not logged-in</p>";
            }
        }
    }
    public function sysInfo() {
        
        if ($this->isOn == true) {
            
            if($this->lock == true) {
                echo "<br><h1 style='text-align: center;'> CPU: {$this->cpu}%</br> GPU: {$this->gpu}%</br> Storage:{$this->storage}MB</br> Memory:{$this->memory}MB</h1></br> ";

                if ($this->isOn == true) {
                    echo "<h1 style='text-align: center;'>The computer is ON</h1></p>";
                }
                else {
                    echo "<h1 style='text-align: center;'>The computer is OFF</h1></p>";
                }
            }
            else {
                echo "You are not logged-in</p>";
            }
        }
        
    }
    public function login($user, $password) {
        if ($user == $this->user and $password == $this->password) {
            echo "UNLOCKED!</p>";
            $this->lock = true;
        }
        else {
            echo "Wrong Password, try again!</p>";
        }
    }
}
$pc1 = new Computer(12, 10000, 2000, $network = ["Wifi-Unimar", "AndroiAP", "TP-WIFI"], 13, $program = ['Word', 'Excel', 'PowePoint'], $status = false, "user", "123");

$pc1-> turnOn();

$pc1-> login("user","123");
$pc1-> progList();
$pc1-> execute(1);
$pc1-> close();
$pc1-> connect(1);
$pc1-> execute(0);
$pc1-> sysInfo();
$pc1-> sysInfo();
$pc1-> close();
$pc1-> execute(1);
$pc1-> sysInfo();



?>

