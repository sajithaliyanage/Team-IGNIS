<?php

  

        $date =$_GET['r'];
        echo $date;
        $today=date("Y/m/d");
        $date2=date_create($date);
        $date1=date_create($today);
        $diff=date_diff($date1,$date2);
        //echo $diff;
   

?>