# TMH 
![alt tag](https://github.com/lkdml/UTN_PPS_2016/blob/master/documentacion/front-mockups/tmhReadmeLogo.jpg)

## Getting Started

Updated as of development of script prepareDB.sh

Go to cd /workspace/documentacion

In the command line execute the following:

". prepareDB.sh yourc9usernamehere"
or
"source prepareDB.sh yourc9usernamehere"

And the database will be dropped, created and populated.

Use example:

cd

cd /workspace/documentacion

. prepareDB.sh lucasdaniel

NOTE: You MUST enter your C9 username. Source and "." behave as the same command for bash.


__________________


You will need to create the database. 
Start the Database
```
mysql-ctl start
```
Enter in Mysql
```
mysql-ctl cli
```
Now Create the Database
```
create database tmh;
```
Exit
```
exit
```
###ORM Doctrine
You will need to do this with the empty database
```
cd /site/core/libs/vendor/bin
```
Then
```
php doctrine orm:schema-tool:create
```
Then go back to root directory
```
cd -
```
### If you have this database already created
Check if there are new changes and new scripts to run. If not, then start coding!

Otherwise, you will have to drop and start again! Change directory to: /site/core/libs/vendor/bin
```
schema-tool:drop --force
```

## Run Scripts
Enter in Mysql (If you have not started the database, you will need to start it!)
```
mysql-ctl cli
```
Then we select the tmh database
```
use tmh;
```
Then we can run the script (In this example, we are gonna run the script "alta_roles")
```
source documentacion/db-script/alta_roles.sql
```

## Deployment

* **Model**

  * site/modelo/ . Here are all the entity's that Doctrine will use to match with the database
  
* **View**

  * We work with a framework based on MVC(model-view-controller), so that our views go in site/modulos/back-end/view or site/modulos/front-end/view . For the view we use a .tpl file for the html, the .php will be at site/modulos/back-end/ or site/modulos/front-end and it will have all the smarty information with the call to view.tpl.
  
* **Controller**
 * We use the controller to do all our business logic and also we add the routes that smarty needs. The folders are site/modulos/back-end/controlador/ or site/modulos/front-end/controlador/

## Built With

* Doctrine ORM
* Smarty 
* PHP
* Html
* CSS
* JS
* JQuery
* MYSQL

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning
    
    V 1.0-In Progress

## Authors

* **Brian Ducca** - *Initial work* - [TMH](https://github.com/brianducca)
* **Mariano Lopez Senés** - *Initial work* - [TMH](https://github.com/lkdml)
* **Lucas Daniel Bockor** - *Initial work* - [TMH](https://github.com/LucasDaniel77)

See also the list of [contributors](https://github.com/lkdml/UTN_PPS_2016/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
