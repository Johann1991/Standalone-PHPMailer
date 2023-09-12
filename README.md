# Standandalone PHPMailer 📧

## Overview

Standalone PHPMailer is an advanced, yet easy-to-use email sending solution that offers a host of features over the standard PHP `mail()` function. Designed with MVC in mind, this project aims to provide a more modular, maintainable, and feature-rich emailing experience.

## Tech Stack

- HTML
- CSS
- JavaScript
- PHP
- Composer (PHPMailer)
- .env (Environment Variables)

## Features

1. **MVC Architecture**: Organized with a clean Model-View-Controller pattern for modularity and easy maintenance.
2. **Environment Variables**: All sensitive information is securely stored in a `.env` file.
3. **Error Logging**: The logger utility will help you track down issues with ease.
4. **Contact Form**: A sample contact form is included, showcasing the full functionality of the project.

## Benefits Over Standard PHP mail() and Reasons to Use This Project

1. **SMTP Authentication**: Allows the usage of a more reliable external SMTP server with authentication.
2. **Error Handling**: Better error feedback mechanism for debugging and logging.
3. **HTML Content**: Send beautiful HTML emails easily.
4. **Security**: Protects against header injection attacks, which the PHP `mail()` function is susceptible to.
5. **Easy Setup**: With a preconfigured setup, this project is ready to be integrated into any of your PHP applications.
6. **Maintainability**: Thanks to its MVC architecture, it's easier to update or extend the codebase.
7. **Customization**: The project is structured in a way that makes it easy to add new features or modify existing ones.
8. **Comprehensive Logging**: Keep track of what's happening under the hood.
9. **Lightweight**: Only the essential Composer dependencies are included, making it a lean option for email sending.

## File and Folder Structure

```
/standalone_phpmailer
|-- /config
|   |-- .env
|-- /controllers
|   |-- EmailController.php
|-- /logs
|   |-- email_errors.log
|-- /models
|   |-- EmailModel.php
|-- /utils
|   |-- logger.php
|-- /vendor
|   |-- ... (composer files)
|-- /public
|   |-- /assets
|       |-- /css
|           |-- style.css
|   |-- index.php
|   |-- .htaccess
|-- /views
|   |-- contact-form.php
|   |-- 404.php
|-- router.php
|-- File and Folder Structure.txt
```

**Note**: 
Paths may differ depending on where you include these files in your project. 
The `.htaccess` file might also need to be adjusted based on your specific setup.
Please also add your own credentials to the .env, I left some placeholders there to simplify it.

## Getting Started

1. **Clone the Repository**:

   ```
   git clone https://github.com/YourGithubUsername/Standalone-PHPMailer.git
   ```

2. **Optional - Update Dependencies**:

   Although the essential Composer dependencies are included, you can update them by navigating to the project directory and running:

   ```
   composer update
   ```

3. **Environment Variables**:

   Rename `.env.example` to `.env` and update your SMTP details.

4. **Run the Project**:

   Start your PHP server and go to the project's `public` directory in your web browser.

## Dependencies

- PHPMailer: For handling the email sending process.
- `.env`: For securely managing environment variables.