### Thank you for providing me this opportunity to showcase my skills. Here are some key points that are highlighted for short summary and better understanding of the flow of this food ordering web application "FOODSHALA" :

1.) Declaration -

	# I would like to confirm and assure you that all the codes and files are original and no replication or copying of data has been made from any other sources, other than CDN linking files of JQuery and Bootstrap and one JS file named as "typewriter.js"(its used for giving typewriting effect on index.php).

2.) Regarding Application User Roles -

	# The application has been divided into two user-roles, one for the "customer" role and other is the "restaurant" role

3.) Summary of essential user login validation session variables -
	
	# "csrf_token" - to store CSRF token for the current active session	
	# "type" - to determine which user-role has logged in
	# "rest_id" or "cust_id" (whichever applicable) - to store the ID of current logged in user according to its role.

4.) Naming of files -

	# Files that contain HTML and PHP code have been named in Lowercase (Ex- "order_confirm.php")

	# Files with only PHP processing code have been name with a prefix "do" (Ex- "doLogin.php")

5.) About Database handling -

	# DB connection parameters can be edited under "credentials.php" file.
	
	# PHP-PDO has been used for MySQL connection(Reason - for flexibility of switching database in future from MySQL to any other of the 12 databases supported in PDO)

6.) Password storage and Hashing - 

	# All the passwords of users follow the pattern -> 'user_firstname + 1234'

	# Password hashing has been done using "password_hash(pass,PASSWORD_DEFAULT)" inbuilt function.

7.) Security -

	# CSRF token validation approach has been used for protection against external scripting.

	# Prepare statements have been used for protection against injection attack in database.

8.) Form data validaition -

	# The JS validation files for form data can be found in "js" directory with filename suffix as "Validator.js"

9.) Regarding "ui" directory -

	# Its used to store the targeted (php + html) code for different UI elements that have been included at appropriate places in the codebase.These files can't work as standalone.

10.) Responsive -
	
	# The web application has been designed with mobile first approach,the layout is responsive and looks cool on mobile screens.

11.) A VERY THOROUGH ATTEMPT HAS BEEN TO COVER ALL DISCOVERABLE USE CASES AS PER MY KNOWLEDGE. GUIDANCE REGARDING ANY LEFTOVER CASE WILL BE HIGHLY APPRECIATED. 

**************************  THANKYOU ! *******************************************