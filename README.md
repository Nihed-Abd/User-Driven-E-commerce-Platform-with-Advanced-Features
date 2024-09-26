# User-Driven-E-commerce-Platform-with-Advanced-Features

## Overview
This project is a comprehensive e-commerce platform developed using Symfony. It allows users to add and sell products, while the admin dashboard provides tools for managing and monitoring the platform's operations.

Description:
An advanced Symfony-based e-commerce platform designed to facilitate the buying and selling of products added by users. The system includes a robust admin dashboard for managing the site and is integrated with Stripe for secure payments. It offers a range of features including product ratings, advanced search options, post and comment functionality, PDF and Excel exports, statistical analysis, discounts, auctions, secure login and checkout, and a shopping cart.


### Features
User Interface:

User registration and login with secure authentication
Add, edit, and delete products
Product rating system
Advanced search functionality
Posts and comments for user engagement
Shopping cart management
Auctions for select products
Discounts and special offers
Secure checkout process supported by Stripe
Admin Dashboard:

User and product management
Order management and processing
Generate and export reports in PDF and Excel formats
Statistical analysis and insights
Discount and promotion management
Monitor auctions and bids
Advanced search and filtering options


#### Requirements

PHP 7.4 or higher
Symfony 5.0 or higher
MySQL 5.7 or higher
Apache/Nginx web server
Composer for dependency management
Stripe API keys for payment processing


##### Installation
* Clone the repository:

git clone https://github.com/Nihed-Abd/User-Driven-E-commerce-Platform-with-Advanced-Features.git

* Navigate to the project directory

cd ecommerce-platform

* Install dependencies using Composer:


composer install
Configure the database:

* Create a MySQL database
Import the provided SQL schema into the database
Update the database configuration in the .env file

*Set up Stripe:

Register your site with Stripe
Add your Stripe API keys to the .env file

*Install JavaScript dependencies:

npm install

*Build the front-end assets:

npm run dev

*Start the Symfony server:

symfony server:start

##### Usage
Access the application: Open a web browser and navigate to http://localhost:8000
Admin login: Use the credentials set during the installation process to access the admin dashboard
User registration: Users can register and log in to add products, participate in auctions, and make purchases


######Contribution
If you wish to contribute to this project, please follow these steps:

Fork the repository
Create a new branch (git checkout -b feature-branch)
Make your changes
Commit your changes (git commit -m 'Add some feature')
Push to the branch (git push origin feature-branch)
Create a new Pull Request
