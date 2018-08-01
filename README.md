# EVIUS API (Events)
Este proyecto se encuentra el API de EVIUS plataforma de eventos.

EVIUS se compone de los siguientes proyectos
no es necesario instalarlos todos según el desarrollo que se quiera realizar.

- EVIUS API  https://bitbucket.org/modev/eviusapilaravel/src
- EVIUSAUTH https://bitbucket.org/modev/eviusauth 
- administradorevius (para administrar los eventos) https://bitbucket.org/modev/administradorevius
- eviusfirebasemanagement   (para actualizar los usuarios en firebase) https://bitbucket.org/modev/eviusfirebasemanagement 
- frontvius (el portal que ven los usuarios no administradores https://bitbucket.org/modev/frontvius

### Documentation
API Documentation can be found inside this repository  in public/docs it can be loaded in a brower is pure HTML

for developers:
documentation can be generated using

```
php artisan api:generate --routePrefix="api/*" 
```

How this documentation is generated can be found in https://github.com/mpociot/laravel-apidoc-generator


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

- PHP 7.1 (works on Laravel) 
- MongoDB (compass gui visual client)
- Composer
- Evius auth server (https://bitbucket.org/modev/eviusauth/)
- el login se maneja con el este servicio de autenticación, tiene que estar corriendo para poder loguearse.


### Installing

1. First install mongodb

2. Then install MongoDB PHP Driver
https://github.com/mongodb/mongo-php-driver

installing MongoDB PHP Driver is somewhat involved:  

using pecl:

* sudo apt-get install php7.x-dev
* sudo pecl install mongodb
* You should add "extension=mongodb.so" to php.ini for web and cli versions
* restart webServer

3. composer install inside proyect folder

4. generate encryption key

```
php artisan key:generate
```
and store the key in .env file with APP_KEY name

```
APP_KEY = ZqxYyhRadx1UNwPgdjXsmeG/MvBZO6ZR6PeUuCa6cAs=
```

5. Make sure storage folder has right permissions for laravel to store stuff there.




## DE AQUI PARA ABAJO ES EJEMPLO NO MIRAR
A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
Give the example
```


```
Give examples
```


And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
