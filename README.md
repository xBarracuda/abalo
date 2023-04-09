Gani Aytan - 3517912
Mert Karaköse - 3515190

# Abalo - Online Marketplace

## Quick Overview:
Welcome to Abalo, our open-source online marketplace built on Laravel! This project is a part of our university coursework and provides a convenient way for people to buy and sell products online. <br> <br>
Our marketplace features a range of products, from electronics to fashion, and allows sellers to customize their listings with product descriptions, images, and pricing. Abalo also supports multiple payment methods, making it easy for buyers to pay for products and for sellers to receive payment.

## Requirements
1. PHP Version ^8.1
2. Composer
3. Node.js and npm

## Steps
1. Clone the repository to your local machine.
2. Open the terminal/command prompt and navigate to the project directory;
```
$ cd abalo
```
3. Run the following command to install the required dependencies:
```
$ composer install
```
4. Change the .env.example file to .env and configure the environment variables as per your requirements.
5. Generate an application key by running the following command:
```
$ php artisan key:generate
```
6. Create a database for your Laravel application and update the .env file with the database credentials.
7. Run the following command to run any pending migrations:
```
$ php artisan migrate
```
8. Run the following command to seed the database with initial data:
```
$ php artisan db::seed --class DevelopmentData
```
9. Run the following command to install npm packages:
```
$ npm install
```
10. Run the following command to compile the front-end assets:
```
$ npm run dev
```
11. Start the development server by running the following command:
```
$ php artisan serve
```

## Note
The above steps assume that PHP, Composer, Node.js and npm are installed on your system. If you encounter any errors, make sure to install the required software and add it to your system's PATH.
