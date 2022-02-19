# About
We want to build job portal with limited functionality, Have two APIs to register and manage jobs. 
We have two types of users (regular and manager).
The job has a little title (max 100 chars) and a description.
The regular user is only able to see, create and update his jobs. The manager can see all tasks. When a
new job is created, the managers should be notified.

## requirements 
1. PHP > 8, MySQL, Redis
2. Docker installed on you machcine 

## Installation. 
1. clone git repo to your local machine.

```bash
$ git clone project_git
$ cd app
```

**Manual Installation**

```sh
$ composer install

# Migrate each module individually as needed
$ php artisan module:migrate Company
$ php artisan module:migrate Users
$ php artisan module:migrate Jobs

# Migrate core component 
$ php artisan migrate

# Seed DB with test data 
$ php artisan db:seed

# Also you can seed each module individually as needed 
$ php artisan module:seed module_name

# Run the app
$ php artisan serve
```

**Docker Installation**
```sh
$ cd app
$ docker build . -t <your username>/job_portal
$ docker run -p 80:80 <your username>/job_portal

# Get container ID
$ docker ps
```

## Technologies and Architecture:
**System Component:**
1. Laravel 9 
2. MYSQL as Database Engine
3. Redis as a message broker used to decouple/queue background events from the rest of the busniess logic.

**System Structure:**
We aim to build Monolithic Modular application, ready to be decoupled if needed with couple of command.
Each Module has its own database, controllers, services, events , configurations and tests suits.
Used Laravel [Pachage link](https://github.com/nWidart/laravel-modules) 
Following is the structure:
```sh
app/
bootstrap/
vendor/
Modules/
  ├── Users/
      ├── Assets/
      ├── Config/
      ├── Console/
      ├── Database/
          ├── Migrations/
          ├── Seeders/
      ├── Entities/
      ├── Http/
          ├── Controllers/
          ├── Middleware/
          ├── Requests/
      ├── Providers/
          ├── UsersServiceProvider.php
          ├── RouteServiceProvider.php
      ├── Resources/
          ├── assets/
              ├── js/
                ├── app.js
              ├── sass/
                ├── app.scss
          ├── lang/
          ├── views/
      ├── Routes/
          ├── api.php
          ├── web.php
      ├── Repositories/
      ├── Tests/
      ├── composer.json
      ├── module.json
      ├── package.json
      ├── webpack.mix.js
```

**System Classes:**
There are three primary objects: User, Entity (e.g. company, notifications.), and Job
![alt text](https://github.com/khaledhabsa/job_portal/blob/main/job_portal/entities.jpeg)


**System Classes:**


## Run test cases:
```sh
# Run all test cases of system module.
$ php artisan test
```

## Queueing System:
We will use redis as a message broker in development mode to queue the background events from the rest of the busniess logic.
We can use SQS later in production environment.

*Example:*
1. When user post a new job, manager will be notified
2. When new user registred, verification email will be sent.

*Configration:*
Make a redis as a default Queue Connection
1. Open queue.php file in configration folder, it would be like
```sh
    'default' => env('QUEUE_CONNECTION', 'redis'),
```
2. Change "driver" to be Redis. 
```sh
    'connections' => [
        'sync' => [
            'driver' => 'redis',
        ],
    ]
```
3. Sending notifications can take time, especially if we will send OTP or Email. So lets Queue he  notifications by adding the ShouldQueue interface and Queueable trait to the class.
By using this way, We will Queue the event/listner also the notification itself.  


## Deploy on Kubernetes:

**requirements**
1. Docker Installed.
2. Rancher Desktop - https://rancherdesktop.io .
3. kubectl if not installed .

*Build  your docker image:*
```sh
$ cd app
$ docker build . -t app-name
$ docker run -p 80:80 -d app-name
# Get container ID
$ docker ps
```

## Deploy to Kubernetes - Rancher Desktop or other types. 
1. create a deployment .
```sh 
$ kubectl apply -f kubernetes/deployment.yaml 
deployment.apps/app-name created

$  kubectl get pods
```

2. create a service to expose this app .
```sh
$ kubectl apply -f kubernetes/service.yaml
service/app-name created

$ kubectl get svc
```
