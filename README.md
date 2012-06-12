Custom-php-admin
================

Custom-php-admin for dashboard  with CRUD operations



1.ABOUT THIS APPLICATION

******************************************

  Custom-PHP-Admin application is flexible and provides an easy-to-use interface for managing your data built on core PHP.

2.FEATURES

******************************************

 It is composed of the following features:
    Display database tables
    Create new data
    Easily update data
    Safely delete data
    Custom actions
    Sorting and filtering
    Export data to CSV/JSON/XML
 
3.INSTALLATION

******************************************
1.Open the config_db.php file and update the configuration information (with your localhost name, dbusername, dbpassword and database  ) 

  	$server = " ";
		$username = " ";
		$password = " "; // if any
		$database = " "; // where you want your table to save 

2.Create table for admin members and history table by using  file custom_php_admin.sql .
	
4.After this view at: http://localhost/custom-php-admin by login  with your username and password (username:admin  and password:admin).

4.REQUIREMENTS

******************************************

You must have PHP 5.0 or greater installed.

5.WHAT THIS APPLICATION CONTAINS

******************************************

Below is a list of files used in this application:

custom-php-admin.php - This is the file for user login form

dashboard.php - This is the file for showing row count of table with progress bar.

listadd.php - This file contains all  the model work to work with this application.

show_edit.php - This file works with displaying individual record that the user enter the database.

function.php - This file is works with filtering process.

csv.php,xml.php, json.php - These files works with export data respective authentication forms.

pagination.php - This file works with pagination for data records entered to database.

logout.php - In this file , the session will be destroyed and redirects  to Custom-php-admin.php page. 

includes/css - This file contains the  StyleSheet used to beautify our application.

includes/images -Tthis file contains all relevant images included in this application.

includes/js - This file contains all js file that is included in the application.

custom_php_admin.sql - This file contains the data to create admins table and history table.





<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/login.JPG
" alt="login" title="login">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/datarecords.JPG
" alt="datarecords" title="datarecords">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/addnew.JPG
" alt="addnew" title="addnew">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/export.JPG
" alt="export" title="export">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/history.JPG
" alt="history" title="history">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/show.JPG
" alt="show" title="show">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/edit.JPG
" alt="edit" title="edit">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/delete.JPG
" alt="delete" title="delete">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/Historys.JPG
" alt="History" title="History">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/filter.JPG
" alt="filter" title="filter">
<img style="max-width:100%;" src="https://github.com/rajitha-nyros/Custom-php-admin/raw/master/screenshots/multidelete.JPG
" alt="multidelete" title="multidelete">

