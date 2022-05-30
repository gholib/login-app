# Login App

## Deploy api

Api requires [php >=7.4] & [composer latest]

Install the dependencies and devDependencies and start the server.

First step:

```sh
cd api
```

Second step:

```sh
composer install
```

Third step:
```sh
cp config.axample.php config.php (set your db environtments)
```
Fourth step:

```sh
composer db_migrate
```
Fives step:

```sh
composer db_seed
```
Sixes step:

```sh
composer serve
```
Api will run in localhost:3001
## Deploy fronted

App requires [nodejs >=16.1] & [npm latest]

Install the dependencies and devDependencies and start the server.

First step:

```sh
cd front
```

Second step:

```sh
yarn install (or npm i)
```
Third step:
```sh
yarn start (or npm run start)
```

Front will run in localhost:3000
