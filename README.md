# Al Arafat Tours & Travels

A responsive Laravel site based on the Al Arafat Hajj, Umrah, Ziyarat, About, and Contact pages. The homepage is served from `/`, with dedicated pages at `/hajj`, `/ziyarat`, `/about`, `/contact`, and `/umrah-package-from-mumbai`.

## Run locally

Requirements: PHP 8.2+, Composer, MySQL, and the dependencies installed in `vendor/`.

The app uses the MySQL database `alarafat-lara` by default. Create that database in MySQL/phpMyAdmin, then update `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env` if your local MySQL settings differ. Create the application tables with:

```powershell
php artisan migrate
php artisan serve
```

Open the URL printed by Artisan, usually `http://127.0.0.1:8000`.

## Homepage files

- `resources/views/home.blade.php` contains the page structure and content.
- `resources/views/hajj.blade.php` contains the Hajj package and article page.
- `resources/views/ziyarat.blade.php` contains the Ziyarat package and article page.
- `resources/views/about.blade.php` contains the company About, promise, and mission page.
- `resources/views/contact.blade.php` contains the contact form, office information, and Google Maps embed.
- `resources/views/umrah.blade.php` contains the seven Mumbai Umrah packages, guide, rituals, and FAQ.
- `public/css/home.css` contains responsive layout and visual styles.
- `public/js/home.js` handles the banner carousel, mobile navigation, booking form scroll, and newsletter feedback.
- `public/js/hajj.js` handles Hajj and Ziyarat page navigation and booking form behavior.
- `routes/web.php` maps the root URL to the homepage.

## Images and fonts

The logo, banners, package photography, partner marks, and newsletter artwork are loaded from the public media library at `alarafat.com`. Google Fonts supplies DM Sans and Playfair Display. For a fully self-hosted deployment, copy these approved media assets into `public/images/` and update their URLs in the Blade and CSS files.

## Uploaded package and blog images

Package and blog images uploaded in the admin dashboard are stored on Laravel's public disk in `storage/app/public`. After deploying to a server, run this once from the Laravel application root:

```bash
php artisan storage:link
```

This creates `public/storage`, the public URL link to the uploaded files. The `public/storage` link and uploaded files are not committed to Git, so create the link on each server and make sure the web-server user can write to `storage/app/public`. The web server's document root must point to Laravel's `public` directory. If the link already exists but images still return 404, verify that the requested image exists under `storage/app/public` on that server; uploaded files are not transferred by a Git push.

## Current interactions

Banner arrows and dots change slides; the Umrah submenu opens on desktop hover or keyboard focus and on mobile tap; the mobile navigation expands and collapses; booking search scrolls to each page's package list. The Hajj and Ziyarat pages list package details and articles; the Umrah page includes seven package options, a pilgrimage guide, and FAQs. The contact form opens the visitor's configured email application; connect it to a mail service for server-side delivery. Newsletter submission currently displays an in-page confirmation only. Connect it to a mailing-list service before collecting real subscriptions. Package cards and the Umrah submenu link to their current Al Arafat pages.
