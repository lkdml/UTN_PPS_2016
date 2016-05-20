# TMH 
![alt tag](https://github.com/lkdml/UTN_PPS_2016/blob/master/documentacion/front-mockups/tmhReadmeLogo.jpg)

## Getting Started

Updated as of development of script generarBase.sh

Go to cd /workspace/db

In the command line execute the following:
```
. generarBase.sh yourc9usernamehere
```
or
```
source generarBase.sh yourc9usernamehere
```
And the database will be dropped, created and populated.

Use example:
```
cd

cd /workspace/db

. generarBase.sh lucasdaniel
```

NOTE: You MUST enter your C9 username. Source and "." behave as the same command for bash.

Then you will need to create the entities, for that, we provide you with a .php doing it for you!

In folder workspace/db
Run the project and make sure you are running it into workspace/db

If you are using Cloud 9, you will have this url
```
https://utnpps-brianducca.c9users.io/
```
Now you will execute our php!
```
https://utnpps-brianducca.c9users.io/generadorDeEntidades.php
```
Ready!

__________________

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
