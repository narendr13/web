<?php
session_start();

if(array_key_exists('userid', $_SESSION )){
    $userName = $_SESSION['userid'];
}
else {
        header('Location: index.php?error=notloggedin');
}

include 'header.php';

?>
<html>
<p style="background-color:white">Web development means building website as per our requirement and its maintenance. We have to consider security measures when we are developing a website.  </p>
<p style="background-color:white">In our development, we used SHA1 function for password hashing. As per L. Hemme and L. Hoffmann (2011), SHA1 function works on 32 bit words and it most and it is the most fault model on 32 bit platforms. 
So, it is not recommended to use SHA1 function for password hashing.  </p>
<p style="background-color:white">Session variables are used to keep user logged in and to provide access to the pages which have user access.  According to J. Hasan and A. M. Zeki (2019), usage of sessions also have other advantage which is automatic logging out after the session time expired. We implemented sessions to prevent unauthorised access to users. So, they can only access our website when they are logged in. 
We did not implemented session time out in our application and it can be implemented. </p>
<p style="background-color:white">Prepared statements are the query templates and these will interact with database with given user input. So, the template cannot be changed by attackers as it is fixed.  According to K. Amirtahmasebi, S. R. Jalalinia and S. Khadem (2009), in prepared statements question mark(?) takes limited variables and variable values containing invalid characters like single quotes and double quotes.We used sql prepared statements in our application to avoid cross-side scripting and each and every input received from user will be validated and sanitized.  
Therefore, risk of sql injections will be reduced. </p>
<p style="background-color:white">To get valid input from user all the fields are validated and majority of the fields are instructed as mandatory fields. We have to provide better user experience by communicating with user with appropriate messages.  
And also we need to improve searching options in our application. I just implemented basic search option.</p>
</html>