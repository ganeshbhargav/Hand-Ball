<?php
 
function show_userbox()
{
    // retrieve the session information and display the username (current user)
    
    $u = $_SESSION['USN'];//getting the current sessions usn from the database table see login page
    
    // display the username 
echo "<div id='userbox'>Welcome $u<span id='logout'><a href='./logout.php'>Logout</a></span></div>"; 
}
?>