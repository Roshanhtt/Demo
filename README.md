CSV file processing program

•	This is a PHP program which can run from a Command Line application.

•	This is a small program which validates and modify the format of people’s names and emails stored in a CSV file and inserts them into a MySQL database. 

•	It checks for duplicated data, unnecessary special characters and additional spaces. 

•	It can properly format people’s names with upper and lower case characters.

•	It checks for the position of ‘@’ sign on the email address and even do domain checks. 

•	It can detect MySQL data inserting restrictions. For instance, MySQL gives an error for names like O'Connor and O'Hare, but this program can bypass those errors and insert the name into the database.


Assumptions

•	Before running the program, please make sure the relevant CSV files with input data saved inside the source directory of the main program.

•	Make sure all the Command Directives are in lower case.

•	Program was developed in an environment of Microsoft Windows 10 with PHP 5.5.29 and MySQL Server 5.6.25. 	

