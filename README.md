CSV file processing program

•	This is a PHP program which can run from a Command Line application.
•	This is a small program which validates and modify the format of people’s names and emails stored in a CSV file and inserts them into a MySQL database. 
•	It checks for duplicated data, unnecessary special characters and additional spaces. 
•	It can properly format people’s names with upper and lower case characters.
•	It checks for the position of ‘@’ sign on the email address and even do domain checks. 
•	It can detect MySQL data inserting restrictions. For instance, MySQL gives an error for names like O'Connor and O'Hare, but this program can bypass those errors and insert the name into the database.

Command line Directives for the program
Command line
Directive	Description
--file		Command to pass the CSV file name.
example: --file=users.csv
--Create_table	Command to create just the Mysql Users Table. 
example: --create_table 
--Dry_run	Command to run the program and pass the CSV file name without inserting data into the database. 
example: --dry_run --file=users.csv
-u	Command to change the username of Mysql Database. example: -u=root
-p	Command to change the password of Mysql Database. example: -p=password
-h	Command to change the hostname of Mysql Database. example: -h=hostname
-help	Command to display all the available commands with details. example: --help
Note: if you want assign a value to a Command Line Directive, use “ = “sign next to the Directive. Example: --file=users.csv

Assumptions
•	Before running the program, please make sure the relevant CSV files with input data saved inside the source directory of the main program.
•	Make sure all the Command Directives are in lower case.
•	Program was developed in an environment of Microsoft Windows 10 with PHP 5.5.29 and MySQL Server 5.6.25. 	

