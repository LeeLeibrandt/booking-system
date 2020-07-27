<?php

    require_once('./includes/hotel.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Hotel</title>
</head>
<body>
    <?php

        //use PHPMailer\PHPMailer\PHPMailer;
        //use PHPMailer\PHPMailer\Exception;

        //require('vendor/autoload.php');

        require_once('./includes/compare.php');
        require_once('./includes/booking.php');
        require_once('./includes/hotels_detail.php');
        require_once('./includes/functions.php');
    
    ?>
    <form role=form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
        <div class="inputs">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" required >
        </div>
        <div class="inputs">
            <label for="Lastname">Last Name:</label>
            <input type="text" name="lastname" id="Lastname" required >
        </div>
        <div class="inputs">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required >
        </div>
        <div class="inputs">
            <label for="start">Start data:</label>
            <input type="date" name="indate" id="start"  min="2020-01-01" max="2023-12-31" required >
        </div>
        <div class="inputs">
            <label for="end">End date:</label>
            <input type="date" name="outdate" id="end"  min="2020-01-01" max="2023-12-31" required >
        </div>
        <select name="hotel1" required>
            <option value="Raddison">Raddison</option>
            <option value="Mount Nelson">Mount Nelson</option>
            <option value="Holiday Inn">Holiday Inn</option>
            <option value="Sun International">Sun International</option>
        </select> 
        <select name="hotel2" required>
            <option value="Raddison">Raddison</option>
            <option value="Mount Nelson">Mount Nelson</option>
            <option value="Holiday Inn">Holiday Inn</option>
            <option value="Sun International">Sun International</option>
        </select>
        <button type="submit" name="submit">Compare</button>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $compare = new Compare(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['firstname'],
                $_POST['indate'],
                $_POST['outdate'],
                $_POST['hotel1'],
                $_POST['hotel2']
            );
    
            $compare->daysBooked($_POST['indate'], $_POST['outdate']);
            $compare->displayInfo();
    
            $_SESSION['cost1'] = cost($allHotels, "name", $_POST['hotel1'], $compare->daysBooked, "daily");
            $_SESSION['cost2'] = cost($allHotels, "name", $_POST['hotel2'], $compare->daysBooked, "daily");
    
            echo "The cost of the stay at ". $compare->$_POST['hotel1']."is ". $_SESSION['cost1'];
            echo "The cost of the stay at ". $compare->$_POST['hotel2']."is ". $_SESSION['cost2'];
    
            $_SESSION['compareHotelArr'] = compareHotelsMain($allHotels, $_POST['hotel1'], $_POST['hotel2'], "name");
    
            $compare->compareHotels($_SESSION['compareHotelArr']);
            $compare->bookButton();
    
            unset($_POST['submit']);
        }
        
        if(isset($_POST['selectHotel'])){
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $email = new Booking($_SESSION['firstname'], 
                                $_SESSION['surname'], 
                                $_SESSION['email'],
                                $_SESSION['indate'], 
                                $_SESSION['outdate'],
                                $_SESSION['hotel1'],
                                $_SESSION['hotel2']);
            //Determine which hotel user selected to display correct price total : returns object
            $email->selectedHotel = selectedHotel($_SESSION['compareHotelArr'], "name", $_POST['selectHotel']);
            //random ref num for email
            $email->refNumber = ceil((rand(0,100000)));
            $email->totalCost = totalCost($email->selectedHotel, "name", $_SESSION['hotel1']);
            $email->sendEmail($mail, true);
            echo " Your reference Number is " . $email->refNumber;
        }   
    ?>

</body>
</html>