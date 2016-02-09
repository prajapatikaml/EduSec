# EduSec 2.0.0 #
Point release 2.0.0: 17/10/2013

# EduSec 2.1.0 #
Point release 2.1.0: 16/01/2014

# EduSec 2.1.1 #
Point release 2.1.1: 15/04/2014

# EduSec 3.0.0 #
Point release 3.0.0: 04/10/2014

# EduSec 4.0.0 #
Point release 4.0.0: 31/05/2015

# EduSec 4.1.0 #
Point release 4.1.0: 08/06/2015


Edusec - College Management Software
====================================

EduSec has a suite of selective modules specifically tailored to the requirements of education industry. EduSec is engineered and designed considering range of management functions within university. With the use of EduSec, staff can be more accountable as it helps to know the performance of each department in just few seconds. 

Almost all departments within education industry (e. g. admission, administration, time table, examination, HR, finance etc) can be synchronized and accessed. 

EduSec helps to assign the responsibilities to employee staff and can reduce time wastage and can speed up the administrative functions. Core functions like admissions, library management, transport management, students attendance in short entire range of university functions can be well performed by EduSec.


DOCUMENTATION AND SUPPORT
-------------------------
* www.rudrasoftech.com/forum


SYSTEM REQUIREMENTS
-------------------
* A web server that can execute PHP
* A password-protected MySQL database server connection, 
  and a database on which the user of the  connection has 
  full permissions rights (i.e. SELECT, DROP, CREATE and UPDATE)
* PHP 5.4.0 or later
* PHP must be run as the same system user that owns the directory 
  where EduSec will be installed.


QUICK INSTALL
-------------
For the impatient, here is a basic outline of the
installation process, which need to collect a little 
information before we can get your application 
up and running :
 
1) Move/Upload EduSec to the web directory of your choice.

2) Create a new single MySQL database for EduSec to store all
   its tables.

3) Browse to the Edusec folder and you will be redirected 
   to the EduSec requirement checker is display details of 
   minimum requirements by EduSec.
   If your your server configuration not satisfies please 
   solved problem before installing EduSec else click to install button.

4) Next, you should be taken to the install.php script, 
   which will lead you through creating a `config/db.php` 
   file with create MySQL database and then setting up EduSec, 
   creating an admin user account and institute setup etc.    

5) You are now ready to use EduSec.


MANUAL INSTALLATION
-------------------
For manual installation used only when EduSec won't create the database 
for you, this has to be done manually before you can access it,
which need to go following step to done:

1) Move/Upload EduSec to the web directory of your choice.

2) Create a new single MySQL database for EduSec to store all
   its tables.

3) Import EduSec database into `applicationPath/database`.
   If you wish you install sample data please upload edusec-sample-db.sql
   other wise upload edusec-empty-db.sql.   

4) Go to `applicationPath/config` and rename file `db-sample.php` to 
   `db.php`

5) Edit the file `applicationPath/config/db.php` with real data, for example:
   ```php
   return [
	'class' => 'yii\db\Connection',
	'dsn' => 'mysql:host=localhost;dbname=edusec',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
   ];
   ```

6) Next, you will be redirected to welcome/login page.
   If you upload sample-database wii be redirect login page
   other wise redirect welcome page and then setting up EduSec, 
   creating an admin user account and institute setup etc.      

7) You are now ready to use EduSec.


DEMO/SAMPLE DATABASE USERS DETAILS 
----------------------------------
### ADMIN USER
Username : admin
Password : admin

### EMPLOYEE USER
Username : employee
Password : employee

### STUDENT USER
Username : student
Password : student


**NOTE:**
---------- 
If you any error/display blank page in browse before installing application.you should be able to access the application through the following URL to check EduSec requirement it satisfies or not:
~~~
http://localhost/edusec/edusec-requirements.php
~~~
