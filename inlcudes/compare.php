<?php

class Compare {
    
    public $firstname, $lastname, $email, $indate, $outdate, $cost1, $cost2;

    function __construct($n0,$n1,$n2,$n3,$n4,$n5,$n6) {
        $_SESSION['firstname'] = $this->firstname = $n0;
        $_SESSION['lastname'] = $this->lastname = $n1;
        $_SESSION['email'] = $this->email = $n2;
        $_SESSION['indate'] = $this->indate = $n3;
        $_SESSION['outdate'] = $this->outdate = $n4;
        $_SESSION['hotel1'] = $this->hotel1 = $n5;
        $_SESSION['hotel2'] = $this->firstname = $n6;
    }

    function daysBooked($param1, $param2){
        $this->indate = $param1;
        $this->outdate = $param2;

        $datatime1 = new Datetime($this->indate);
        $datatime2 = new Datetime($this->outdate);
        $interval = $datetime1->diff($datatime2);

        $this->daysBooked = $interval->format('%R%a');
    }

    function displayInfo(){
        echo "<br> First Name : " . $this->firstname . "<br>" .
        "Surname : " 
        . $this->surname . "<br>" . 
        "Start Date : " . $this->indate . "<br>" . 
        "End Date : " . $this->outdate . "<br>" .
        "You are booking for " . $this->daysBooked . "Days<br>" .    
        "Hotel Name One : " . $this->hotel1 . "<br>" .
        "Hotel Name Two : " . $this->hotel2 . "<br>" .    
        "Select your Hotel : <br>
        <form role=\"form\" action=";
        echo htmlspecialchars($_SERVER['PHP_SELF']);  
        echo " method=\"post\">
        <input type=\"radio\" name=\"selectHotel\" value=\"".$this->hotel1."\">".$this->hotel1."<br>"."
        <input type=\"radio\" name=\"selectHotel\" value=\"".$this->hotel2."\">".$this->hotel2."<br>";
    }

    function compareHotles($param){
        echo "
            <table>
                <tr>
                    <th>Features</th>
                    <th>Hotel 1 : ". $param[0]->name."</th>
                    <th>Hotel 2: ". $param[1]->name."</th>
                </tr>
                <tr>
                    <td>Pool</td>
                    <td>"; 
                    echo ($param[0]->pool) ? "Yes" : "No"; 
                    echo    "</td>
                    <td>"; 
                    echo ($param[1]->pool) ? "Yes" : "No";
                    echo "</tr>
                <tr>
                    <td>Bar</td>
                    <td>";
                    echo ($param[0]->bar) ? "Yes" : "No";
                    echo "</td>
                    <td>";
                    echo ($param[1]->bar) ? "Yes" : "No";  
                    echo "</td>
                </tr>
                <tr>
                    <td>Kid Friendly</td>
                    <td>";
                    echo ($param[0]->kidFriendly) ? "Yes" : "No";
                    echo "</td>
                    <td>";
                    echo ($param[1]->kidFriendly) ? "Yes" : "No";
                    echo  "</td>
                </tr>
                <tr>
                    <td>Spa</td>
                    <td>";
                    echo ($param[0]->spa) ? "Yes" : "No";    
                    echo "</td>
                    <td>";
                    echo ($param[1]->spa) ? "Yes" : "No";
                    echo "</td>
                </tr>
            </table>
        ";
    }

    function bookButton(){
        echo "
            <form 
                class='form-inline' 
                role='form' 
                action=" .  htmlspecialchars($_SERVER["PHP_SELF"]). " 
                method='post'
            >
            <button 
                type=\"submit\" 
                value=\"book\"
                >Book</button>
            </form>
        ";
    }

}

//oIBsFvrPmNRLZMHvBmSZ -> server