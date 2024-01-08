# System Information Library

This repository contains the source code for a System Information (SI) Cafe application. The application aims to provide a comprehensive system for managing cafe-related information, including orders, menus.

## Installation Steps:

1. **Clone Repository**

    ```bash
    git clone -b laravel https://github.com/fauzanlnh/Web-SI-Perpustakaan.git
    cd Web-SI-Perpustakaan
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

    or

    ```bash
    composer update
    ```

3. **Setup or Create File .env**

    ```bash
    cp .env.example .env
    ```

4. **Generate APP_KEY in file .env**

    ```bash
    php artisan key:generate
    ```

5. **Create Database**

    Set up a database for the application.

6. **Migrate & Seed Database**

    ```bash
    php artisan migrate --seed
    ```

7. **Link folder storage to public folder**

    ```bash
    php artisan storage:link
    ```

8. **Run Local Server**
    ```bash
    php artisan serve
    ```
    Access the web application at http://localhost:8000.

These instructions provide a step-by-step guide to set up the System Information Cafe application on a local environment. Make sure to follow each step carefully to ensure a successful installation.

## Features

### Books Management:

-   Efficiently track and manage details of books in the bookstore.
-   Add, edit, or remove books with ease.
-   Keep information updated, including titles, authors, categories, and publishers.

### Book Author Management:

<!-- -   Manage information related to book authors seamlessly. -->

-   Add new authors and update their details as needed.
<!-- -   Associate authors with specific books for comprehensive tracking. -->

### Book Categories Management:

<!-- -   Organize books into different categories for better navigation. -->

-   Create, edit, or delete book categories as the inventory evolves.
<!-- -   Enhance user experience by providing well-defined book classifications. -->

### Book Publishers Management:

<!-- -   Keep track of book publishers and their details. -->

-   Manage publishing houses efficiently by adding, editing, or removing entries.
<!-- -   Associate publishers with respective books for comprehensive cataloging. -->

### Borrowing Book Management:

-   Streamline the process of borrowing books from the bookstore.
-   Monitor and manage book loans, due dates, and return status.
-   Enhance customer experience by providing a smooth borrowing process.

### Members Management:

-   Efficiently manage information about bookstore members.
-   Add new members, update their details, and keep records organized.
<!-- -   Facilitate communication with members for events, promotions, etc. -->

### Staff Management:

-   Manage staff members responsible for bookstore operations.
-   Add, edit, or remove staff profiles with their respective roles.
<!-- -   Monitor and assign tasks to staff members for optimal workflow. -->

## Example View

This screenshot showcases a sample view of the SI Library application.

### Members Management View

![Example View](./public/assets/img/readme/member-index.PNG)
![Example View](./public/assets/img/readme/member-form.PNG)

### Books Maangement View

![Example View](./public/assets/img/readme/book-index.PNG)
![Example View](./public/assets/img/readme/book-form.PNG)

### Borrowing Book Management View View

#### Borrowing Book Transaction

![Example View](./public/assets/img/readme/transaction-borrow-book-index.PNG)
![Example View](./public/assets/img/readme/transaction-borrow-book-form.PNG)

#### Returning Book Transaction

![Example View](./public/assets/img/readme/transaction-return-book-index.PNG)
![Example View](./public/assets/img/readme/transaction-return-book-form-1.PNG)
![Example View](./public/assets/img/readme/transaction-return-book-form-2.PNG)

## Technologies Used

-   **Laravel:** PHP framework for web application development.
-   **Composer:** Dependency manager for PHP.
-   **MySQL:** Relational database for storing application data.
-   **Bootstrap:** Utility-first CSS framework for styling and layout.
-   **AdminLTE:** A powerful open-source admin dashboard template based on Bootstrap.

## Contributors

-   [Fauzan Lukmanul Hakim](https://fauzanlnh.vercel.app)

## License

This project is licensed under the [MIT License](LICENSE).
