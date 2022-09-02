#Install project
composer create-project laravel/laravel pharmacy

#Install Composer-Ui Package for authentication
composer require laravel/ui
php artisan ui bootstrap --auth

#NPM install for CSS
npm install && npm run dev

#If error run
npm run build

#Migrate tables
php artisan migrate

#Make controller
php artisan make:controller PharmacyController -r

#Make Model
php artisan make:model Pharmacy -m

#form validation
php artisan make:Request PharmacyStoreRequest

#create link for use storage images
php artisan storage:link