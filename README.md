# PHP Flashcards

## Features

- User registration and authentication
- Create, edit, and delete flashcards
- Organize flashcards into categories
- Study mode to review flashcards
- Responsive design for desktop and mobile devices

## Technologies Used

- **PHP**: Backend programming language
- **Symfony**: PHP framework for building web applications
- **Doctrine**: ORM for database management
- **MySQL**: Database for storing user data and flashcards
- **HTML/CSS**: Frontend markup and styling
- **Bootstrap**: Responsive design framework
- **JavaScript**: Dynamic interactions for a better user experience

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Grodelek/Php_Flashcards.git

2. Run in terminal:
   ```bash
   composer install
   npm install

3. Create mysql database with tables flashcards && user
   ```bash
    CREATE TABLE flashcards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic VARCHAR(255) NOT NULL,
    answer TEXT NOT NULL,
    user_id INT NOT NULL,
    card_status VARCHAR(50) DEFAULT 'NULL');

   CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    roles JSON NOT NULL, 
    password VARCHAR(255) NOT NULL);
   
3. Create .env file in root directory and add this:
   ```bash
   DB_URL=mysql://myuserName:mypassword@localhost:3306/mydatabaseName

4. Run App
   ```bash
   symfony serve


    



