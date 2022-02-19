php artisan key:generate
php artisan config:cache
php artisan config:clear
php artisan migrate
php artisan module:migrate Company
php artisan module:migrate Users
php artisan module:migrate Jobs

# Seed DB with test data 
php artisan module:seed

php artisan optimize

php artisan serve --host=0.0.0.0 --port=80
