<?php

    //Hotel Properties : Name, Daily Rate, Pool, Bar, Kid Friendly,  
    $radison = new Hotel("Raddison", 350, true, false, true, false);
    $sun = new Hotel("Sun International", 500, true, true, true, true);
    $nelson = new Hotel("Mount Nelson", 450, true, false, true, true);
    $holiday = new Hotel("Holiday Inn", 250, false, false, false, false);   
        
    $allHotels = array($radison, $sun, $nelson, $holiday);   
