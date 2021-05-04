## Explanation
I started working on this project, last 2 nights for a few hours, cause I had no free time in last few days, so only weekend was my option.

I haven't worked Laravel for more than 3 years, but I finished project as asked,
probably it is not best code ever, but in a short time, I will be in the top form as I promised, I am fast learner.
I need to learn best practices in the Laravel, like I have now in the Django(Python).

## SETUP

- First of all you will need to install Laravel on you machine.
- Second thing you will need to install composer, after that run **[composer install]()**
- You will need to install NodeJS, so after NodeJS installation finished, you will need to run **[npm install]()**
- You will need local database I used XAMPP for the local database and also PhpMyAdmin.
## Git clone
Project is deployed to the Heroku, so here is repo on the Heroku.
You can just run git clone https://git.heroku.com/immense-cliffs-50739.git.
After repo is cloned locally, you will need to change directory to the root of that project.

## Migrations and Seeds
Locally you will need to run **[php artisan migrate]()**, so after that you will need to run
**[php artisan db:seed]()**, after everything is finished, you can run **[php artisan serve]()** to start local server.

## HEROKU DEPLOYMENT
I had to install HEROKU CLI and create an account on Heroku, for MySQL database to be used, I had to verify my credit card.
I followed steps as in the Heroku documentation is stated, but had few different issues:
- After deployment migration were not working(later found out that local database was MariaDB, but on the Heroku, I used MySQL, but had no time to change it)
- Different migrations behaved totally different from the local environment, so I had to find workarounds for these issues(Like to used text instead of json in migrations).
- After deployment, had to add different environment variables, cause problem was with insecure connections and forms. This made me change different environment variable, to the point of changing SESSION_STORAGE, also APP_URL was needed, had to activate APP_DEBUG to be True, to see what is happening, even if that is not a practice in the production environments.
- Had to expell some of the route() method or assets() and to use basic string, cause https would create problem for login and different pages.

##USAGE
The heroku application can be found here:
https://immense-cliffs-50739.herokuapp.com/

There are two users:
1. admin@gmail.com -> password (will work)
2. anes@gmail.com  -> password (wont work)

admin@gmail.com is an Admin user, anes@gmail.com is not an Admin user.
This admin part of the task is finished by using only 1 field is_admin on the User model, that should be solved by using Roles and Permission(RBAC),
but I had no time for that also, to make it much more simpler and in fact easier to maintain. Also users can have more than one role at a time.


##ISSUES
- I finished all the task, probably I misunderstood the last model fields of practices, where I added Tags external library to be able to create different tags for different fields of practice.
- Pagination is not ideal in the front end sense, I am most of the front end probably sucks.
- Public storage(filesystem) is available locally, but on the Heroku that is not possible, for those kinds of environments, we will need to use S3 or other type of CDNs.
- Had to solve CSRF for the forms, cause page 419 Page expired was popping and I was unable to log in.
- You will probably have issue with creation of the fields of practice, they work locally, but on the Heroku, I found this to be an issue: https://github.com/spatie/laravel-translatable/issues/208,
but as I said, changing MySQL database to MariaDB, at the last moment, I had no time to switch it that easily, I found few solution, but Models that are using this, were of the external library.
