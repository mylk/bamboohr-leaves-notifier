# bamboohr-leaves-notifier

Running this command will allow you to utilize webhooks for the leaves functionality of BambooHR.

## Usage

### Prerequisites

PHP 7 is required for `bamboohr-leaves-notifier` to run.

### Installing

Clone this project:

```
git clone https://github.com/mylk/bamboohr-leaves-notifier
```

Install the dependencies:

```
composer install
```

### Run

To execute `bamboohr-leaves-notifier` and get some help: 

```
cd bamboohr-leaves-notifier
bamboohrleaves list
```

Configure `config/parameters.example.yaml` file to meet your team and notification configurations
and rename to `config/parameters.yaml`.

To poll for changes on leaves:

```
bamboohrleaves poll
```

## Contributing

`bamboohr-leaves-notifier` is open source and of course you can contribute. Just fork the project, have fun
and then create a pull request.

A `Makefile` has been created to group some tasks needed for development. Find those tasks below.

### Running the tests

```
make tests
```

### Syntax checks

```
make check-syntax
```

### Coding style checks

The coding style that is followed is [PSR-2](https://www.php-fig.org/psr/psr-2/).

```
make check-style

```

### Quality checks

```
make check-quality

```

## Built With

* [symfony/console](https://symfony.com/components/Console) - The library used for the command line interface
* [symfony/yaml](https://symfony.com/components/Yaml) - The library used to read the YAML configuration of the application
* [symfony/dependency-injection](https://symfony.com/components/DependencyInjection) - The library that instantiates the services used in the project
* [doctrine/orm](https://www.doctrine-project.org/projects/orm.html) - An object relational mapper (ORM)

## Versioning

[SemVer](http://semver.org/) is used for versioning. For the versions available, see the [tags](https://github.com/mylk/bamboohr-leaves-notifier/tags). 

## Authors

See the list of [contributors](https://github.com/mylk/bamboohr-leaves-notifier/contributors).

## License

This project is licensed under the GPLv2 License - see the [LICENSE](LICENSE) file for details.
