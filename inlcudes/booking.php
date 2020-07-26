<?php

class Booking {

    public $selectedHotel, $totalCost, $refNumber, $firstname, $lastname, $email, $indate, $outdate, $hotel1, $hotel2;

    function __construct($n0, $n1, $n2, $n3, $n4, $n5, $n6) {
        $this->firstname = $n0;
        $this->lastname = $n1;
        $this->email = $n2;
        $this->indate = $n3;
        $this->outdate = $n4;
        $this->hotel1 = $n5;
        $this->hotel2 = $n6;
    }

    function sendEmail($param1, $param2){
        if($param2){
            try{
                //Server settings live server
                $param->SMTPDebug = 0;                          // Enable verbose debug output
                $param->isSMTP();                               // Set mailer to use SMTP
                $param->Host       = 'mail.rabbitmacht.co.za';  // Specify main and backup SMTP servers
                $param->SMTPAuth   = true;                      // Enable SMTP authentication
                $param->Username   = 'lyndon@rabbitmacht.co.za';// SMTP username
                $param->Password   = 'n.NhF3G1vgI=';            // SMTP password
                $param->SMTPSecure = 'ssl';                     // Enable TLS encryption, `ssl` also accepted
                $param->Port       = 465;                       // TCP port to connect to

                //Recipients
                $param->setFrom('leeleibrandt9@gmail.com', 'Lee Leibrandt');
                $param->addAddress($this->email, 'A guy from earth');     // Add a recipient
                $param->addReplyTo('leeleibrandt9@gmail.com', 'Hotel Information');

                // Content
                $param->isHTML(true);                                  // Set email format to HTML
                $param->Subject = 'Dream hotel Booking';
                $param->Body    = 
                    "Hi ".$this->firstname." ".$this->surname. " <br> 
                    Please see details of your booking below <br>
                    Hotel name: <b>".$this->selectedHotel->name."</b> <br>
                    From : ".$this->indate." to : ".$this->outdate. "<br>
                    The cost of the total stay is ". $this->totalCost . "<br>
                    Please deposit funds into the following account<br>
                    Hotel Booking, Standard Bank, 5409098790, 1092, Cheque <br>
                    Using reference Number " .$this->refNumber."<br>
                    Any further queries you have can be directed to <br>
                    admin@thehotelbookingteam.co.za<br>
                    Thanks for your bussiness and we look forward to hearning back from you<br>
                    <br>The Dream Team";
                $param->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $param->send();
                echo 'Message has been sent';
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$param->ErrorInfo}";
            }
        }
        else{
            try {
                //Server settings
                $param->SMTPDebug = 0;                    // Enable verbose debug output
                $param->isSMTP();                         // Set mailer to use SMTP
                $param->Host       = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                $param->SMTPAuth   = true;                // Enable SMTP authentication
                $param->Username   = '058c8c10955c23';    // SMTP username
                $param->Password   = 'a66e65a4ae45ce';    // SMTP password
                $param->SMTPSecure = 'TLS';               // Enable TLS encryption, `ssl` also accepted
                $param->Port       = 2525;                // TCP port to connect to

                //Recipients
                $param->setFrom('leeleibrandt9@gmail.com', 'Lee Leibradt');
                $param->addAddress('leeleibrandt9@gmail.com', 'a good guy');     // Add a recipient
                $param->addReplyTo('leeleibrnadt9@gmail.com', 'Hotel Information');

                // Content
                $param->isHTML(true);                                  // Set email format to HTML
                $param->Subject = 'Hotel Booking';
                $param->Body    = 
                    "Hi ".$this->firstname." ".$this->surname. " <br> 
                    Please see details of your booking below <br>
                    Hotel name: <b>".$this->selectedHotel->name."</b> <br>
                    From : ".$this->indate." to : ".$this->outdate. "<br>
                    The cost of the total stay is ". $this->totalCost . "<br>
                    Please deposit funds into the following account<br>
                    Hotel Booking, Standard Bank, 5409098790, 1092, Cheque <br>
                    Using reference Number " .$this->refNumber."<br>
                    Any further queries you have can be directed to <br>
                    admin@thehotelbookingteam.co.za<br>
                    Thanks for your bussiness and we look forward to hearning back from you<br>
                    <br>The Hotel Bookings Team";
                $param->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $param->send();
                echo 'Message has been sent';
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$param->ErrorInfo}";
            }
        }
    }
}