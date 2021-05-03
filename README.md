# quick set up

   # 1
      composer install
   # 2
      npm install
   # 3
      npm run prod
   # 4 (IF DB CREDENTIALS ARE POPULATED IN THE DOT ENV)
      php artisan migrate:fresh --seed 
   # 5
      php artisan serve

# jetstream set up

   # 1
      composer require laravel/jetstream
   # 2
      php artisan jetstream:install inertia
   # 3
      npm install
   # 4
      npm run dev
   # 5
      php artisan migrate
   # 6
      php artisan serve

# runs database migrations
php artisan migrate

# generate migrations from current db
php artisan migrate:generate -ignore="personal_access_tokens" 

# create controller
php artisan make:controller EventsController --resource

# create model
php artisan make:model Event

# create migration
php artisan make:migration create_flights_table

# create seeder
php artisan make:seeder UserSeeder

# run seeders
php artisan db:seed

# run migrations
php artisan migrate

# run migration
php artisan migrate --path='./database/migrations/2021_05_01_153104_create_campaigns_table.php'

# re run migration
php artisan migrate:rollback --path='./database/migrations/2021_05_01_153104_create_campaigns_table.php'

# run migration and seeders together
php artisan migrate:fresh --seed 

# create test
php artisan make:test UserTest

# run tests
php artisan test

# run test
php artisan test --filter 'CampaignTest'

# create storage link for imgs
php artisan storage:link

# other commands

composer create-project laravel/laravel example-app

php artisan optimize:clear

composer require laravel/sail --dev

php artisan sail:install

alias sail='bash vendor/bin/sail'

sail up