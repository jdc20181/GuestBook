<?php 
$allowed_html_tags = ""; 
$addtotop = "1"; // This determines the order to display it. Leave for newest comments on top or change to 0 for oldest to newest. 

// Checks if the user wants to view the form or add a entry 
if ( 
$_SERVER['REQUEST_METHOD'] == 'POST' ) { 

             // Make sure the script works if register_globals is off 
             $name = $HTTP_POST_VARS['name']; 
             $post = $HTTP_POST_VARS['post']; 

             // Process the Information Entered and Remove Stuff 
             $post = strip_tags($post, $allowed_html_tags); // Strip HTML 
             $post = stripslashes($post); // Strip Slashes 

             $time = date("F jS Y, h:iA");   

             if ($addtotop == "0" ) { 

                          // Writes the user's entry to a file 
                          $fp = fopen("data.php",  "a");   
                          fputs($fp, "<p><b>Posted by:</b> " . $name . "</p><p>" . $post . "</p><p><b>Time: </b>" . $time . "</p>");
                          fclose($fp); 

             } 

             if ($addtotop == "1" ) { 

                          // Get all the current entries and put it in a string 
                          $att1 = "data.php"; 
                          $att2 = fopen ($att1, "rb"); 
                          $currententries = fread ($att2, filesize ($att1)); 
                          fclose ($att2); 

                          // Writes the user's post to a file 
                          $fp = fopen("data.php",  "w+");   
                          fputs($fp, "<p><b>Posted by:</b> " . $name . "</p><p>" . $post . "</p><p><b>Time: </b>" . $time . "</p>" . $currententries); 
                          fclose($fp); 

             } 

header("Location: index.php?error=false"); 

} else { 
header("Location: index.php?error=true"); 
} 
?>
