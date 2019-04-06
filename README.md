# Sale office website

## Installation

Build the Docker image

```
docker build --name sale-office .
```

Run the site
```
docker run -d -p 8888:80 --name sale-office sale-office
```

## Development

Start Docker image and mount development directory
```
docker run -d -p 8080:80 --name sale-office-dev -v "$PWD/www":/var/www/html php:7.2-apache
```
