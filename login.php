<html>
<head>
<link rel="stylesheet" href="profile.css"/>
<link rel="stylesheet" href="linkers.css"/>
<link rel="stylesheet" href="bg.css"/>
</head>
<?php
// Database settings

// database hostname default:localhost
// localhost is the name of the server used in the project:xampp->apache 3306
define("HOST", "localhost");

// Database user
define("DBUSER", "root");

// Database password is the password of the database administrator
define("PASS", "");

// Database name is the database we are currently working on and the table loginmovie is created. 
define("DB", "practice");


############## Making the mysql connection ###########

$conn = mysql_connect(HOST, DBUSER, PASS);//establish a connection between database and the server

if (!$conn) //checking if the connection is established
{
	// the connection failed to establish so quit the script
	die('Could not connect ! <br />Please contact the site\'s administrator.');
}

$db = mysql_select_db(DB); //selecting the database ...the function is inbuilt and returns a boolean value

if (!$db)
{
	// cannot connect to the database so quit the script
	die('Could not connect to database !<br />Please contact the site\'s administrator.');//the backslash is used in the statement so that the symbol ' can be displayed in the string
}

require_once ("functions.inc.php");



//  to check the users authenticity(login)
    if (isset($_POST['button']))
    {
       	 	// retrieve the username and password sent from login form
        	// First we remove all HTML-tags and PHP-tags,
        	// This step will make sure the script is not vurnable to sql injections.
        	$u = strip_tags($_POST['input1']);  //retrieving the username(usn) from the loginform file
        	$p = strip_tags($_POST['password1']);  //retrieving the password from the loginform file
        
		//Now let us look for the user in the database i.e checking if the usn and password is existing int he database loginmovie
        	$query = sprintf("SELECT slno FROM practice.table1 WHERE name= '%s' AND password= '%s';",$u, $p);
       
	 	$result = mysql_query($query);
        	// If the database returns a 0 as result we know the login information is incorrect.
        	// If the database returns a 1 as result we know  the login was correct and we proceed.
        	// If the database returns a result > 1 there are multple users
        	// with the same username and password, so the login will fail.
        
		if (mysql_num_rows($result) != 1 || $u == "null" || $p == "null")//checking if the username and password are null or number of rows selected are more //than one
        	{
            		// invalid login information
            		echo "<script>window.alert('Wrong username or password!');</script>";
            		//show the loginform again.
            		echo"<script>window.location.assign('test.html');</script>"; //display or redirect the page back to loginform page and display its contents so that the user should enter fresh values
        	} 
		else {
            		// Login was successfull

              		// Save the username for use later
           		 $_SESSION['USN'] = $u;
			
              		// Now we show the userbox i.e call the userbox function which gives a welcome message with the name of the user
            		show_userbox();//calling the function to display the welcome message
        	    }
    }

 
   


	else if (isset($_POST['button1']))
	{
		$u = strip_tags($_POST['input2']);  //retrieving the username from the loginform file
        	$p = strip_tags($_POST['password2']);  //retrieving the password from the loginform file	


		$sql = sprintf("INSERT INTO practice.table1 (name,password) VALUES ('%s', '%s');",$u, $p);
		
		$querycheck = sprintf("SELECT slno FROM practice.table1 WHERE name = '%s' AND password= '%s' LIMIT 1;",$u, $p);
       		$resultcheck = mysql_query($querycheck);
		
			if (mysql_num_rows($resultcheck) == 1 || $u=="null" ||$p=="null")
			{
				echo "<script>window.alert('Cannnot create a new account.Pls try again');</script>";
				echo "<script>window.location.assign('test2.html');</script>";
			}			
		
			else
			{
				$insertresult = mysql_query($sql);
       

    	  		 	if ($insertresult === FALSE)
        			{
           				 // cannot enter values to table 
            				echo "<script>window.alert('ERROR in entering information.Pls try again');</script>";
            				//show the loginform again.
            				echo "<script>window.location.assign('index.html');</script>";
				 //display or redirect the page back to loginform page and display its contents so that the user should enter fresh values
        			} 
				else {
              				// Save the username for use later
              				$_SESSION['USN'] = $u;
              				// Now we show the userbox i.e call the userbox function which gives a welcome message with the name of the user
					
					/*$resultx = mysql_query("SELECT name FROM practice.table1");
					$storeArray = array();
					while ($row = mysql_fetch_array($resultx) )
						{
   							 $storeArray[] =  $row['name']; 
							for(i=0;i<storeArray.count-1;i++)
							$_SESSION[i]=storeArray[i];
	
						}*/

            				show_userbox();//calling the function to display the welcome message
       		     	     	     }	
			}
       }

	else 
	{
    	 	// User is not logged in and has not pressed the login button
    		 // so show him the loginform i.e redirect it back
        	echo"<script>window.location.assign('test.html');</script>";
   	}

 
?>



<body>
<img id="bg" src="fifacrowd.jpg"></img>
<a href="cputeam.html"><div class="option" id="play">PLAY</div></p>
<script src="bgprof.js"></script>
</body>
</html>
