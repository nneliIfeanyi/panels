<?php
  // Simple page redirect
  function redirect($page){
    header('location: '.URLROOT.'/'.$page);
  }

  /* 
 * Custom function to compress image size and 
 * upload to the server using PHP 
 */ 
function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
           imagejpeg($image, $destination, $quality);
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            imagepng($image, $destination, $quality);
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            imagegif($image, $destination, $quality);
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
           imagejpeg($image, $destination, $quality);
    } 
     
     
    // Return compressed image 
    return $destination; 
} 



// PHP program to convert timestamp 
// to time ago 

  

function to_time_ago( $time ) { 

      

    // Calculate difference between current 

    // time and given timestamp in seconds 

    $diff = time() - $time; 

      

    if( $diff < 1 ) {  

        return 'less than 1 second ago';  

    } 

      

    $time_rules = array (  

                12 * 30 * 24 * 60 * 60 => 'year', 

                30 * 24 * 60 * 60       => 'month', 

                24 * 60 * 60           => 'day', 

                60 * 60                   => 'hour', 

                60                       => 'minute', 

                1                       => 'second'

    ); 

  

    foreach( $time_rules as $secs => $str ) { 

          

        $div = $diff / $secs; 

  

        if( $div >= 1 ) { 

              

              

            $t = round( $div ); 

              

            return $t . ' ' . $str .  

                ( $t > 1 ? 's' : '' ) . ' ago'; 

        } 

    } 
} 

  
// to_time_ago() function call 

//echo to_time_ago( time() - 5);