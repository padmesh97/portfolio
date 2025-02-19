<?php

// function time_elapsed_string($datetime, $full = false) {
//     date_default_timezone_set("Asia/Kolkata");
//     $now = new DateTime;
//     $ago = new DateTime($datetime);
//     $diff = $now->diff($ago);

//     $diff->w = floor($diff->d / 7);
//     $diff->d -= $diff->w * 7;

//     $string = array(
//         'y' => 'year',
//         'm' => 'month',
//         'w' => 'week',
//         'd' => 'day',
//         'h' => 'hour',
//         'i' => 'minute',
//         's' => 'second',
//     );
//     foreach ($string as $k => &$v) {
//         if ($diff->$k) {
//             $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
//         } else {
//             unset($string[$k]);
//         }
//     }

//     if (!$full) $string = array_slice($string, 0, 1);
//     echo $string ? implode(', ', $string) . ' ago' : 'just now';
// }
 
// FUNCTION DEVELOPED By .............PADMESH KUNWAR...........


function time_elapsed_string($time)
{
    date_default_timezone_set("Asia/Kolkata");
    $refTime=strtotime($time);
    $currTime=time();
    $diff=$currTime-$refTime;

    $datetimearray = explode(" ", $time);
    $date = explode("-", $datetimearray[0]);
    $times = explode(":", $datetimearray[1]);
    $months=array("Jan","Feb","March","April","May","June","July","Aug","Sep","Oct","Nov","Dec");
    if((int)floor($diff/31650000)==0)
    {
        if((int)floor($diff/2592000)==0 && (int)floor($diff/86400)<7)
        {
            if((int)floor($diff/86400)==0)
            {
                if((int)floor($diff/3600)==0)
                {
                    if((int)floor($diff/60)==0)
                    {
                        if((int)$diff<=40)
                            return "Just Now";
                        else
                        return ((int)$diff)." seconds"." ago";
                    }
                    else
                        return ((int)floor($diff/60)).((int)floor($diff/60)==1?" minute":" minutes")." ago";
                }
                else
                    return ((int)floor($diff/3600)).((int)floor($diff/3600)==1?" hour":" hours")." ago";
            }
            else
                return ((int)floor($diff/86400)).((int)floor($diff/86400)==1?" day":" days")." ago";
        }
        else
           return $date[2]."-".$months[(int)$date[1]-1]."-".$date[0]." at ".$times[0].":".$times[1];
    }
    else
        return $date[2]."-".$months[(int)$date[1]-1]."-".$date[0];
   
}

?>