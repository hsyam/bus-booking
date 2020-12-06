# Bus Booking App 


Stack.

  - Laravel 8
  - Mysql 5.7
  - Docker
  - nginx


# Base Code Struce!

  - Services and repository pattern
   


# ToDo:
  - Query optimization for some services 
  - Index Bus Routs and trips 
  - Use strategy Pattern at booking  services 
  - Write test cases
 

### Installation

Deocker requires .
Exposed Ports : 8000 and 3306

Run Project .

```sh
$ git clone https://github.com/hsyam/bus-booking 
$ cd bus-booking
$ cp  .env.example .env
$ docker-compose build webserver
$ docker-compose up -d 
$ docker-compose exec webserver php artisan migrate
$ docker-compose exec webserver 
$ docker-compose exec webserver php artisan db:seed
```



### Docs

Porject Api Documentation 

| Docs | Url |
| ------ | ------ |
| Swager |  http://127.0.0.1:8000/api/documentation |
 

@hsyam
