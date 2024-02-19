<h1>Library Management System</h1>

A simple web based DBMS for a library which lists the content of all tables within the database, made with HTML, PHP and MySQL.

It allows adding, editing and removing entries from any desired table. 

Foreign key checks are enforced by default from the database: for example you cannot add a book's author (as an ID) if the author's ID doesn't exist in the Authors table, because author's ID is a foreign key in Books table

At the moment, only admin view is implemented but a viewer or editor roles might be added in the future.

A sign up/log in form was also implemented but for the sake of simplicity, anyone with access to the form can sign up and login immediately (advanced security measures to be implemented later).

Data existing right now in the database are dummy and I cannot guarantee its accuracy. Database design is also subject to change for better data integrity and fast access.

This website is hosted at https://librarydbms.000webhostapp.com/ (Free hosting. Expires on 19th March 2024)
