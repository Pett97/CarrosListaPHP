## Peterson Henrique de Padua

## Carros

"Simple List of Car in PHP
"

### Dependências

- Docker
- Docker Compose

### To run

#### Clone Repository

```
$ git clone https://github.com/Pett97/CarrosListaPHP.git
$ cd CarrosListaPHP
```

#### Define the env variables

```
$ cp .env.example .env
```

#### Define the file database

```
$ touch ./database/brand.txt
$ touch ./database/cars.txt
$ chmod 777 ./database/cars.txt
$ chmod 777 ./database/brand.txt
```

#### Install the dependencies

```
$ docker compose run --rm composer install
```

#### Up the containers

```
$ docker compose up -d
```
ou


#### Run the tests

```
$ docker compose run --rm php ./vendor/bin/phpunit tests --color
```

