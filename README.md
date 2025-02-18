# Learningo - eLearning Platform

Learningo is an interactive eLearning platform that facilitates communication and collaboration between teachers and students through virtual classrooms, resource sharing, and real-time meetings.

## Features

### User Roles

- **Teachers**
  - Create and manage virtual classrooms (saloons) and groups
  - Share module-specific content
  - Generate and distribute saloon access codes
  - Post educational materials (PDFs)
  - Participate in discussions and comments
  - Host virtual meetings

- **Students**
  - Join classrooms using saloon codes
  - Access educational materials
  - Participate in group discussions
  - Share resources and PDFs
  - Engage in the comment system
  - Attend virtual meetings

- **Administrators**
  - Validate teacher account registrations
  - Manage users and groups
  - System-wide moderation capabilities

### Key Features
- Real-time meeting system powered by Daily API
- Interactive forum for community discussions
- Email verification system
- Password reset functionality
- File sharing capabilities
- Comment and interaction system

## Installation

1. Clone the repository:
```bash
git clone https://github.com/Nabil-Bil/Learningo.git
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database credentials in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eLearning
DB_USERNAME=root
DB_PASSWORD=
```

7. Configure mail settings in `.env` for verification and password reset:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

8. Seed the database with sample users:
```bash
php artisan db:seed
```

## Default Users

After seeding, you can login with these sample accounts:

1. **Admin Account**
   - Email: admin@admin.com
   - Password: admin@admin.com

2. **Teacher Account**
   - Email: jhon_doe@outlook.com
   - Password: jhon_doe

3. **Student Account**
   - Email: jhon_doe@outlook.fr
   - Password: jhon_doe

## Requirements

- PHP >= 8.1
- MySQL
- Node.js & NPM
- Composer

## Contributing

If you'd like to contribute, please fork the repository and create a pull request.
