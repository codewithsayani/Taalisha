# Talisha Software

**Engineering Intelligent Systems for the Next Digital Era.**

Talisha Software is an enterprise-grade web application platform built to showcase cutting-edge solutions in Agentic AI, Cloud Computing, and advanced software development.

## Project Overview

This repository contains the full source code for the Talisha Software public website and internal CMS panel. It features a custom-built cinematic frontend experience alongside a robust backend administration system.

### Key Features
- **Cinematic Frontend**: Custom GSAP animations, including a premium multi-layered amber glow introductory sequence (restored from the original brand identity).
- **Responsive UI/UX**: Built with Tailwind CSS for flawless performance on all devices.
- **Filament CMS Admin Panel**: A fully integrated content management system for managing Articles, Case Studies, Services, Industries, Team Members, and more.
- **Secure Authentication**: Hardened admin login using Spatie Roles & Permissions, enforcing strict access controls.
- **SEO Optimized**: Dynamic metadata and structured layout for optimal search engine indexing.

## Tech Stack
- **Backend:** Laravel 11.x, PHP 8.4, SQLite/MySQL
- **Frontend:** Tailwind CSS, Alpine.js, GSAP (GreenSock Animation Platform)
- **Admin Panel:** Filament PHP v3
- **Build Tools:** Vite

## Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/codewithsayani/Taalisha.git
   cd Taalisha
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

4. **Database Migration & Seeding:**
   ```bash
   php artisan migrate --seed
   ```
   *(This will create the necessary tables and populate the default super admin user and settings).*

5. **Build Frontend Assets:**
   ```bash
   npm run build
   ```
   *(For active development, run `npm run dev` instead).*

6. **Serve the Application:**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://localhost:8000`.

## Accessing the Admin Panel

Navigate to `/admin` to access the Filament CMS dashboard. 
*Note: The cinematic intro is intentionally bypassed on all `/admin` routes to ensure instant access to the login portal.*

## License

This project is proprietary and confidential. Unauthorized copying, distribution, or modification of this software is strictly prohibited.
