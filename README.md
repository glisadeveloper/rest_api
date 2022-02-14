# RestFul Api - example by Gligorije
	* Custom PHP API example using some PHP 8 features ( a few )
	* This example shows how one should restful service work
	* Database Wrapper with the Singleton Pattern
	* Through the developing process, I use Postman for testing endpoints 
	* RestFul Api support method: GET (data display), POST (data entry), PUT (updating data), DELETE (deleting data)

### How to install
	* Clone/Download this repository to local machine or in some server
	* Find in root folder database file (restful.sql) for MySQL and import 
	* In database.php from line 7 add your logins/database parameters for MySQL
	* Use Postman collection for endpoints: https://www.getpostman.com/collections/4e12db0d0e17a61a87bf (replace local ip if you tested on server)

### Other information
	* This is a simple example of creating Api from scratch without using some framework
	* Api contains data processing for products ( I took as an example how endpoints should work )
	* Perhaps as an advanced option it should be integrated x-api-key or other type of authorization ( I'm just suggesting but I did not integrate :) )