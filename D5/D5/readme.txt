
This application requires PHP7 and MySQL (or MariaDB) to run

All coding is within thew one directory. Changes that will be needed, and manual step are;

connect_db.php    This will require the database, username and password values setting to the current database.

table_schema_d5_users.sql   The commands to create the table and to set up the default data should copied and run in MySQL
                            The default data is for 2 users (user001, user002) with full update access, an one with read only access (user003).

table_schema_d5_catalogue.sql  This contains commands to create and load the catalogue table;
                                  - The table create is required
                                  - The data load part is optional. Running this will partially load the catalogue. Not running it will leave the table empty so that data can be loaded from scratch via the application.


The application is run from index.php.

When first started the user will be forced to sign on. 
The screen then displayed will be dependant on the access rights of the user chosen.
Items or categories can the be added, categories moved, or items or categories deleted.
A category must be added before an item can be added.
Categories can only be delete if they have no items and if the have no child categories