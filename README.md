# Project Installation Guide

This Laravel project requires installation of its dependencies through Composer. Follow the steps below to set up the project on your local machine:

### Prerequisites
- Ensure you have [Composer](https://getcomposer.org/) installed on your system.

### Steps to Install and Run the Project:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/azonedev/fda-bs.git
   cd <project-directory>
   ```

2. **Install Dependencies:**
   ```bash
   composer install
   ```

3. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

4. **Start the Development Server:**
    - If you have PHP installed locally, you can use the built-in server:
      ```bash
      php artisan serve
      ```
      The project will be available at `http://localhost:8000`.

    - For Laravel Valet (Mac Users):
      Laravel Valet provides a convenient way to serve your Laravel applications locally.
      Follow the [official Laravel Valet documentation](https://laravel.com/docs/valet) for installation and usage instructions.

    - For Docker (Linux Users):
      You can use a Docker environment for running the project. There's a [Docker repository](https://github.com/azonedev/laradok) specifically configured for Laravel applications.
      Follow the instructions in the [laradok repository](https://github.com/azonedev/laradok) to set up the Docker environment. Once set up, you can run your Laravel application within the Docker container.

5. **Access the Application:**
   Once the server is running, you can access the application in your web browser.


   

### 1. Endpoint for Rider Capture

#### Request
- Method: POST
- URL: `{{basePath}}/v1/rider-capture`
- Payload:
  ```json
  {
      "rider_id": 1,
      "service_name": "food delivery",
      "lat": 90,
      "long": 120
  }
  ```


### 2. Endpoint for Finding Nearest Rider

#### Request
- Method: GET
- URL: `{{basePath}}/v1/find-rider/{restaurantID}`
 to handle the requests and store/retrieve data accordingly.
