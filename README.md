
# coolcode/authapi

`coolcode/authapi` is a Laravel package that simplifies API authentication using Laravel Sanctum. This package provides a set of endpoints for user registration, login, and logout functionality with token-based authentication.

## Installation

1. Install the package via Composer:

   ```bash
   composer require coolcode/authapi
   ```

2. Publish the Sanctum migrations:

   ```bash
   php artisan vendor:publish --tag=sanctum-migrations
   ```

3. Run the migrations:

   ```bash
   php artisan migrate
   ```

4. Finally, issue your Laravel Sanctum tokens when users authenticate with your API.

## API Endpoints

### 1. Register

**Endpoint:** `/api/register`  
**Method:** `POST`  
**Headers:**  
- `Accept: application/json`  
- `Content-Type: application/json`

**Request Body (form-data):**

| Key              | Value        | Type   |
|------------------|--------------|--------|
| name             | test        | text   |
| email            | test@gmail.com | text   |
| password         | password     | text   |
| confirm_password | password     | text   |

**Description:**  
Registers a new user in the system.

### 2. Login

**Endpoint:** `/api/login`  
**Method:** `POST`  
**Headers:**  
- `Accept: application/json`  
- `Content-Type: application/json`

**Request Body (form-data):**

| Key      | Value                | Type   |
|----------|----------------------|--------|
| email    | test@gmail.com | text   |
| password | password             | text   |

**Description:**  
Authenticates the user and issues a Bearer token for future API requests. The token is stored in the environment variable `token`.

### 3. Logout

**Endpoint:** `/api/user/logout`  
**Method:** `POST`  
**Headers:**  
- `Accept: application/json`  
- `Content-Type: application/json`  
- `Authorization: Bearer {{token}}`

**Description:**  
Logs the authenticated user out and invalidates the Bearer token.

## Usage

Once you've installed the package and set it up, you can use these endpoints in your Postman collection or any API client to handle user authentication.

### Postman Example

1. Register a user using the **Register** API.
2. Login using the **Login** API to get the Bearer token.
3. Set the token in your environment variables for future authenticated requests.
4. Logout the user using the **Logout** API.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
