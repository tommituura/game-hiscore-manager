# game-hiscore-manager

A rest api for web browser development project. 

Saves the scores. 

Done in php, uses [Slim](http://www.slimframework.com/) rest framework.

Names of games and players can be only 50 characters long at most. 
Game scores must be positive integers.

### License

MIT

### Installing Slim framework:

First, get the stuff from here: http://www.slimframework.com/install or 
from github: https://github.com/codeguy/Slim .

Then put the 'Slim' directory into the same directory as index.php. It should work then
"just like that". Remember to set file access rights correctly for .htaccess and php files.

### Database connection: 

First, check that db.ini is in .gitignore.

Second, create a db.ini file with host, username and password into the main folder
(no, this might not be the best way but it's this way right now...) Remember to set 
that file's permissions as strict as you can.

    hostname = your-database-host 
    username = your-database-username
    password = your-database-password

To create a database, run initdb.sql into your database. It will create a database schema 'gamemanager' under 
which it will create two sequences for ids and two tables for stuff.

# STATUS

Currently, we are only supporting PostgreSQL. 
__This whole thing is also very much WIP, don't expect anything to work right now.__
