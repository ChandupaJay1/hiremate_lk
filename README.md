<div align="center">
  <h1>🛠️ HireMate LK</h1>
  <p><strong>A modern, trilingual service worker directory and management platform tailored for the Sri Lankan market.</strong></p>
</div>

---

## 📖 About the Project

**HireMate LK** is a comprehensive platform designed to connect users with service workers seamlessly. Built with a focus on localized user experience, the application offers full trilingual support (English, Sinhala, and Tamil) and a beautiful, responsive UI that switches between Light and Dark modes.

The platform provides dedicated dashboards for standard users, service workers, and administrators, making it easy to find workers, manage profiles, and oversee platform analytics.

## ✨ Key Features

- 🌍 **Trilingual Localization:** Full support for English, Sinhala, and Tamil across all user interfaces, including the Worker Directory and Dashboards.
- 👨‍🔧 **Worker Directory & Search:** A filterable grid of registered workers with advanced search capabilities and dynamic "Contact Now" functionality.
- 🔐 **Multi-Guard Authentication:** Secure, role-based login system separating standard users, service workers, and administrators. Uses phone-number-based identification for local accessibility.
- 📊 **Admin Dashboard:** A powerful administrative panel with profile management, password resets, platform analytics, and user registry tracking.
- 💳 **Modern Payment & Billing:** Premium UI for the bill creation view and payment interfaces.
- 🎨 **Premium Aesthetic UI:** A responsive, state-of-the-art interface featuring Teal branding, micro-animations, and full Dark/Light mode compatibility.

## 💻 Tech Stack

- **Backend:** [Laravel 13](https://laravel.com/) (PHP 8.3+)
- **Frontend:** Blade Templating, Vanilla CSS (Modern CSS / Custom Design System), JavaScript, Vite
- **Database:** MySQL / SQLite
- **Environment:** Composer, NPM

---

## 🚀 Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing.

### Prerequisites

Make sure you have the following installed on your local development environment:
- **PHP** >= 8.3.0
- **Composer**
- **Node.js** & **NPM**
- **MySQL** or **MariaDB** (XAMPP/WAMP/Laragon)

### Installation

1. **Clone the repository** (if applicable):
   ```bash
   git clone https://github.com/yourusername/hirematelk.git
   cd HireMate_LK
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install frontend dependencies:**
   ```bash
   npm install
   ```

4. **Set up environment variables:**
   Duplicate the `.env.example` file and rename it to `.env`.
   ```bash
   cp .env.example .env
   ```
   *Update the `.env` file with your database credentials and application URL.*

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations (and seeders if available):**
   ```bash
   php artisan migrate
   ```

7. **Compile frontend assets:**
   ```bash
   npm run dev
   ```

8. **Start the local development server:**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` in your browser.

---

## 🌐 Deployment Notes (e.g., InfinityFree)

If you are deploying this application to a shared hosting environment (like InfinityFree) running an older PHP version (e.g., `8.3.19`), ensure that your `composer.json` is configured correctly:
- The platform config is set to enforce PHP 8.3 compatibility: `"platform": { "php": "8.3.19" }`
- Always run `composer update` locally before uploading the `vendor` directory and `composer.lock` to the remote server to prevent `platform_check.php` errors.

---

## 🛡️ License

This project is open-source and licensed under the [MIT License](LICENSE).
