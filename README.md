# Sparrow 

This is a tool to create a series of Jira tickets associated with onboarding new engineers at Mailchimp. By adding a ticket to a template or job type you will be able to then create an epic with tasks that will outline both the manager and new hires duties that are specific to Engineering at Mailchimp.

## Getting Started

This app in order to run locally relies on LAMP stack, using PHP7, MySql 5.7, and run using an instance of MAMP. 
 
### Prerequisites

Install MAMP version 5.0. See installation instructions [here](https://www.mamp.info/en/downloads/). *Note* MampPro is not necessary, only the oringinal MAMP


### Installing

1) After installing MAMP go to the htdocs folder and clone the Sparrow Repo to your local drive. 

2) Create a database locally for the project, using phpmyadmin or your preferred method. The name for example could be `sparrow`.
    When starting MAMP you will see a browser window pop up. This will include the version and port MySql is running locally. This first page will also include a link to your instance of phpmyadmin. 

3) Create a config directory, with config.php

    This file needs to include something like this:
    
    ```
       $username = ;
       $password = ;
       DEFINE ('DB_USER', 'your_db_username');
       DEFINE ('DB_PSWD', 'your_db_password');
       DEFINE ('DB_HOST','127.0.0.1:your_port_number');
       DEFINE ('DB_NAME', 'your_db_name');
       
       $dbconn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
       ```
       Note: the username and password must be filled in, for credentials see Ali Banta and they will be shared via LastPass

4) Create the tables necessary for your app to run locally. 
    These commands can be found in dbstart.php and can be run by copy and pasting into the window that appears when you navigate to `http://localhost:8080/phpMyAdmin/db_sql.php?db=your_db_name`
    
5) You should now be able to navigate to `http://localhost:8080/path-to-file/hello.php` and see the app working properly. Click to add a ticket, then you should be able to go from there!
 



## Built With
* PHP7
* MySql 5.7

## Versioning

The current master branch is the latest stable version. Any other work happens in branches. 

## Authors

* **Ali Banta** 


## Acknowledgments

* Shanna Terry
* Jay Ponnada
* All the awesome new hires and managers in Engineering for their patience and feedback through this process