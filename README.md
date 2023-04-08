Gani Aytan - 3517912
Mert Karaköse - 3515190

## Requirements
1. PHP Version ^8.1
2. Composer
3. Node.js and npm

## Steps
1. Clone the repository to your local machine.
2. Open the terminal/command prompt and navigate to the project directory.
3. Run the following command to install the required dependencies:
```
composer install
```
4. Change the .env.example file to .env and configure the environment variables as per your requirements.
5. Generate an application key by running the following command:
```
php artisan key:generate
```
6. Create a database for your Laravel application and update the .env file with the database credentials.
7. Run the following command to run any pending migrations:
```
php artisan migrate
```
8. Run the following command to install npm packages:
```
npm install
```
9. Run the following command to compile the front-end assets:
```
npm run dev
```
10. Start the development server by running the following command:
```
php artisan serve
```

## Note
The above steps assume that PHP, Composer, Node.js and npm are installed on your system. If you encounter any errors, make sure to install the required software and add it to your system's PATH.