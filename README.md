# Notes

### About

A very simple Web Application for simple note management written in PHP

It is hosted on [notes.aymaneboukrouh.com](https://notes.aymaneboukrouh.com)

### Features

- User Login System, Email Verification, Password Reset
- Note Management: Add, Edit, Delete

### Requirements

- Apache
- MySQL
- PHPMailer

### Initialization

- Initialize MySQL database by running `assets/db/init_db.sql`
- Set environment variables in Apache

### Configuration Files

- MySQL authentication `modules/db/auth.php`
- SMTP authentication `modules/phpmailer/auth.php`