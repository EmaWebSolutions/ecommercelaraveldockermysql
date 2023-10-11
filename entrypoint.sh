#!/bin/bash

# Check if a flag file exists to determine if migrations and seeders have been run
if [ ! -f /var/www/html/migrations_and_seeders_completed.flag ]; then
    # Print out the values of environment variables for debugging
    echo "DB_HOST: $DB_HOST"
    echo "DB_USERNAME: $DB_USERNAME"
    echo "DB_DATABASE: $DB_DATABASE"

    # Function to check if MySQL is available
    mysql_is_available() {
        mysqladmin ping -h $DB_HOST -u $DB_USERNAME -p$DB_PASSWORD
        return $?
    }

    # Wait for MySQL to become available
    until mysql_is_available; do
        >&2 echo "MySQL is unavailable - sleeping"
        sleep 1
    done

    # Print a message when MySQL is available
    echo "MySQL is available, continuing..."

    # Run Laravel migrations and seeders
    php artisan migrate:fresh --force
    php artisan db:seed --force

    # Create a flag file in the Laravel root directory to indicate that migrations and seeders have been completed
    touch /var/www/html/migrations_and_seeders_completed.flag

    # Add a message indicating that migrations and seeders are done
    echo "All migrations and seeders have been run."

fi

# Start PHP-FPM
exec php-fpm

