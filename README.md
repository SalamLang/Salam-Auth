# SALAM AUTH

## Overview
SALAM AUTH is a robust authentication system designed to provide secure and efficient user authentication for web applications. It supports various authentication methods including password-based, OAuth, and multi-factor authentication.

## Features
- **Password-based Authentication**: Secure user login with hashed passwords.
- **OAuth Support**: Integration with popular OAuth providers like Google, Facebook, and GitHub.
- **Multi-factor Authentication**: Enhanced security with two-factor authentication.
- **User Management**: Admin interface for managing users and roles.
- **Session Management**: Secure session handling with token-based authentication.

## Installation
To install SALAM AUTH, follow these steps:

1. Clone the repository:
    ```sh
    git clone https://github.com/soheilkhaledabdi/salam-auth.git
    cd salam-auth
    ```

2. Install dependencies:
    ```sh
    npm install
    ```

3. Set up environment variables:
    Create a `.env` file in the root directory and add the necessary

4. Run database migrations:
    ```sh
    npm run migrate
    ```

5. Start the application:
    ```sh
    npm start
    ```