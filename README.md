# Coding Task - PHP/JS Developer
## Installation

Install Docker and run the following commands

```bash
docker-compose build
docker-compose up -d
docker exec -it challenge-fullstack-php-js_backend_1 /bin/sh
```

Once you are in the container run and follow instructions
```bash
composer install
```

Then visit `http://localhost` to see the task page. It should not yet work properly.

Study the PHP code in the `src/Controller/OfficesController.php` and the HTML/Javascript code in `templates/Offices/view_office.php`.

## Challenges

### Challenge 1

After you run Docker, import `offices.sql` into the Docker database. The connection parameters can be found somewhere in this repository.

### Challenge 2

Considering the concepts of Domain Driven Design (DDD) and Command Query Responsibility Separation (CQRS), refactor the backend code to be compliant. Include one unit test.

### Challenge 3

Using a frontend Javascript library, format all the visible dates so that they have the following format:  **January 1st 2021, 2:02:07 pm**

### Challenge 4

The database also includes latitude and longitude values for each venue. Make sure this data is returned to the frontend and initialize a Google map in `<div id="map"></div>`. The element with that ID is already present in the codebase. Show all 3 offices as markers on the map. Style and configure the markers and the map in a way which in your opinion matches the current design.

## Finally

Commit and upload to your Github repository