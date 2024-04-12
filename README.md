# Tournament Management System

## Overview
The Tournament Management System is a web application designed to facilitate the organization and scoring of tournaments, allowing participants to compete in various events individually or as part of a team. The system supports multiple types of events, including sporting and academic challenges, and provides flexible registration options for participants.

## Features
- Participant registration as individuals or teams
- Creation and management of tournaments and events
- Scoring system with customizable criteria for each event
- Ranking calculation based on participants' performance in each event
- User-friendly interface for easy navigation and interaction

## Technologies Used
- **Backend**: PHP (Laravel)
- **Frontend**: HTML, CSS (Bootstrap), JavaScript
- **Database**: MySQL
- **Deployment**: Heroku

## Installation
1. Clone the repository to your local machine:
git clone [https://github.com/SULTVNN/tournament-management-system.git](https://github.com/SULTVNN/tournamentApp)



2. Navigate to the project directory:
cd tournament-management-system

4. Install dependencies using Composer:
composer install

6. Create a `.env` file by copying the `.env.example` file and update the database configuration:
cp .env.example .env

8. Run database migrations to create tables:
php artisan migrate

9. Run a database seeders to insert data into the tables
php artisan db:seed

10. Start the development server:
php artisan serve

12. Access the application in your web browser at `http://localhost:8000`

## Usage
- Register as a participant or login if you already have an account.
- Explore tournaments and events available for registration.
- Join events individually or create/join a team to participate.
- View scores and rankings to track your performance.
- Administrators can manage tournaments, events, and scoring criteria.

## Contributing
Contributions are welcome! If you encounter any bugs or have suggestions for improvements, please open an issue or submit a pull request.


## Contact
For inquiries or support, contact [sultan](mmuhammedssultan@gmail.com).
