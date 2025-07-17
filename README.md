## Personal Laravel Starter Kit

A Laravel starter kit built on the **TALL Stack**, along with **Volt** and **Folio** inspired from [Genesis](https://github.com/thedevdojo/genesis). This is a persinal starter kit including only what I need. 

I'm using MaryUI and so pleased using it. So I've changed most of the styles. You may see some sample code in another branch. The main branch has only nessary files and functionalities. 

## Installation

You can use the [Laravel Installer](https://laravel.com/docs#installing-php) to install Genesis.

Clone the reporsitory, sorry this is a personal project, I didn't add a fancy installer.
```bash
git@github.com:kemalyen/personalized-laravel-starter-kit.git
```
And then install packages for frontend and backend

```bash
composer install
npm install
npm run build
```
and create database file and populate it:

```bash
php artisan migrate
php artisan db:seed
```

Then, run `composer run dev` to run the asset watcher, and you're good to go!

## Built With

Below is a list of all the technologies that Genesis has been **built with**:

- [TailwindCSS](https://tailwindcss.com)
- [AlpineJS](https://alpinejs.dev)
- [Laravel](https://laravel.com)
- [Livewire](https://livewire.laravel.com)
- [Folio](https://github.com/laravel/folio)
- [Volt](https://github.com/livewire/volt)

Learn how to install and configure Genesis below.

## Layouts

I customized this part. So you may modify or add your own layouts
Within Genesis there are three layouts, located inside of `resources/views/components/layouts`:

1. **frontend.blade.php** - This is the layout for the frontend
2. **admin.blade.php** - This is the layout used for pages admin pages
3. **main.blade.php** - This is the base main template.


## Credits

-   [Tony Lea](https://twitter.com/tnylea)
-   [TALL Stack](https://tallstack.dev)
-   [TALL Stack Preset](https://github.com/laravel-frontend-presets/tall)
-   [Laravel Breeze](https://github.com/laravel/breeze)
-   [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)
-   [MaryUI](https://mary-ui.com/)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
