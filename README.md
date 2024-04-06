# SuiteLedger

## Introduction

SuiteLedger is a comprehensive maintenance fee tracker designed specifically for apartment complexes. This tool enables property managers and homeowners' associations to efficiently track and manage all maintenance fee transactions. Developed using PHP and MariaDB, SuiteLedger offers a robust solution for managing financial records with precision and ease. The application also incorporates PHPUnit for rigorous testing, ensuring reliability and performance.

## Prerequisites

Before you begin the installation, ensure you have the following software installed on your system:
- PHP 8.0 or newer
- MariaDB 10.3 or newer
- Composer for managing PHP dependencies

## Local Setup

Follow these steps to set up SuiteLedger on your local development machine:

### 1. Clone the Repository

Start by cloning the SuiteLedger repository to your local machine:

`git clone https://github.com/SuiteLedger/suite-ledger-web.git`

`cd SuiteLedger`

### 2. Install Dependencies
   Use Composer to install the required PHP dependencies:

`composer install`

### 3. Configure Database and Email Settings

Create a new MariaDB database and user specifically for SuiteLedger.
Email SMTP also need to be configured if you wish to receive or send emails.
SuiteLedger uses PHPMailer for mail sending.

duplicate `app/core/config.php.example` file within the same directory and rename it to `config.php`

- Database related configuration
  - `DBHOST` - Your database host
  - `DBNAME` - name of the database you use for Suiteledger
  - `DBUSER` - Your database username
  - `DBPASSWORD` - Your database password

    
- Email related settings
    - `EMAIL_SMTP_HOST` - Your email provider's SMTP host (For Gmail: `smtp.gmail.com`)
    - `EMAIL_SMTP_PORT` - Email provider's SMTP port (For Gmail: `587`)
    - `EMAIL_USERNAME` - Your email username
    - `EMAIL_PASSWORD` - Your email password. For Gmail you can use app password
    - `CONTACT_US_MAIL` - Specify the email address you wish to receive the support request mails


## Running Tests

SuiteLedger uses PHPUnit for testing. Run the following command to execute the tests:

`./vendor/bin/phpunit`

## License
SuiteLedger is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit).

