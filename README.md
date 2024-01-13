# Anonymous Auth System

Anonymous Auth System is a secure and privacy-focused authentication system built on a Model-View-Controller (MVC) architecture in PHP. The primary goal of this system is to provide robust user authentication while prioritizing user anonymity and privacy.

## Key Features

- **Anonymous Routing**: Routes are designed to conceal sensitive information, ensuring that the authentication system's inner workings remain private.
- **Secure Sessions**: Implements secure session handling to protect user data and maintain anonymity during user interactions.
- **Modular Architecture**: Easily extend and customize the authentication system with modular components for increased flexibility.
- **Database Abstraction**: Supports various database systems through a flexible and secure abstraction layer.

## Getting Started

Follow these steps to start using the Anonymous Auth System:

1. **Installation**: Clone the repository and set up the system on your server.

    ```bash
    git clone https://github.com/AmpedWasTaken/AnonymousAuthSystem.git
    ```

2. **Configuration**: Adjust the configuration files in the `configs` directory to match your environment.

3. **Create Your First Controller**: Start building your application by creating a controller in the `controllers` directory.

    ```php
    <?php
    class ExampleController {
        public static function showMessage() {
            // Display a simple message
            echo "Hello, this is an example message!";
        }
    
        public static function showForm() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Handle form submission logic
                $name = $_POST['name'];
                $email = $_POST['email'];
    
                // Process form data (you can customize this part based on your needs)
                $message = "Form submitted with Name: $name, Email: $email";
    
                // Display a message or redirect to another page
                echo $message;
            } else {
                // Display a simple form
                include __DIR__ . '/../views/example_form.php';
            }
        }
    }
    ?>
    ```

4. **Define Routes**: Configure your routes in the `configs/routes.php` file to map URLs to controllers and actions.

    ```php
    // add under the other require
    require_once __DIR__ . '/../controllers/ExampleController.php';

     // add to switch
     case 'showMessage':
            ExampleController::showMessage();
            break;
     case 'showForm':
            ExampleController::showForm();
            break;
    ```

5. **Database Setup**: Configure your database connection details in the `configs/config.php` file.

6. **Run Your Application**: Point your browser to the configured base URL and start exploring your anonymous authentication system.

   
