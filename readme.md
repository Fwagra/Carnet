# Carnet

Carnet is a small travelogue made with laravel and material design lite. It provides a blog-like platform where you may publish the different steps of your trips, share pictures and texts. 
Carnet is currently in a very early stage of development and only available in french language.

## Installation 

- Git clone frome the repository `git clone git@github.com:Fwagra/Carnet.git`
- Copy the `.env.example` file to `.env` and fill it with your database credentials and recaptcha key [Get your keys here](https://www.google.com/recaptcha/admin)
- Migrate the database with `php artisan migrate`
- Apply the correct permissions to `storage` and `bootstrap/cache` (775 or 777)
- Retrieve dependencies with `composer update`
- Retrieve frontend dependencies `npm install`
- Generate CSS/JS with `gulp`

## Example

Running example : [Carnet](http://carnet.fabiocerqueira.fr)
