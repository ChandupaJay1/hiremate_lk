# HireMate LK 🛠️

**HireMate LK** is a modern, professional service marketplace designed specifically for the Sri Lankan market. It connects home and business owners with verified, skilled professionals across various industries, from masonry and plumbing to electrical and specialized technical services.

![Platform Preview](https://via.placeholder.com/1200x600/0d9488/ffffff?text=HireMate+LK+Platform+Preview)

---

## 🌟 Key Features

- **Advanced Worker Directory**: Search for professionals using a multi-layer filtering system (Job Category, Province, and District).
- **Premium Worker Profiles**: High-impact profiles featuring verified badges, skill summaries, and location-based data.
- **One-Click Contact**: Seamless "Contact Now" integration for direct communication with service providers.
- **Phone-First Authentication**: Simplified registration and login process using phone numbers for better accessibility in the local market.
- **Trilingual Support**: Fully localized in **English**, **Sinhala (සිංහල)**, and **Tamil (தமிழ்)**.
- **Responsive Design**: A "Stability-First" UI that looks stunning on mobile, tablet, and desktop devices.
- **Green-Themed Branding**: A fresh, professional Teal Green aesthetic that inspires trust and reliability.

---

## 🛠️ Technology Stack

- **Framework**: [Laravel 11](https://laravel.com/)
- **Frontend**: [Tailwind CSS](https://tailwindcss.com/), [Alpine.js](https://alpinejs.dev/)
- **Templating**: Laravel Blade
- **Database**: MySQL
- **Icons**: [Heroicons](https://heroicons.com/)
- **Fonts**: [Outfit](https://fonts.google.com/specimen/Outfit) (Headings) & [Inter](https://fonts.google.com/specimen/Inter) (Body)

---

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/ChandupaJay1/hiremate_lk.git
   cd hiremate_lk
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database:**
   Update the database credentials in your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hiremate_lk
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

6. **Compile Assets & Start Server:**
   ```bash
   npm run dev
   php artisan serve
   ```

---

## 📂 Project Structure

- `app/Http/Controllers/WorkerController.php`: Manages the directory logic and filtering system.
- `resources/views/workers/index.blade.php`: The main worker search interface.
- `resources/views/workers/show.blade.php`: Detailed professional profile layout.
- `resources/lang/`: Contains all trilingual translation files.
- `resources/views/layouts/navigation.blade.php`: Modern, responsive navigation system.

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🤝 Contact

For support or inquiries, please contact:
- **Email**: support@hiremate.lk
- **Website**: [www.hiremate.lk](http://www.hiremate.lk)
