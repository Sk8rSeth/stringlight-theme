# Wp-Booilerplate
This is a boilerplate theme and wp-install to make it very easy to get up and running for a new client wordpress site build.
this is designed around MODULAR builds with ACF-pro. can be used however but a lot of the functionality has that at the core.

### Tech Used
- Composer
- npm packages
- packagist
- gulp (sass and js compiling)
- foundation
- yarn (on your local machine - `brew install yarn` or `npm install --global yarn`)
- ACF-PRO
- FontAwesome5 (free)


### Install instructions
* fork this repo
* clone new repo onto local computer
* update `.env-example` to include the ACF-Pro license key in the `ACF_PRO_KEY="{ACF_PRO_KEY}"` section

* run `composer install` in `/` of repo (where the composer.json file is)
* WP plugins are on [Wpackgist](wpackgist.com)
* edit `.env` to include all credentials for database, sitename, urls, etc
* *if using laravel homestead, edit `.env example` and homestead's `.yaml` configuration to create new database and access it via homesteads defualt UN and password `homestead` - `secret`*

* rename folder `theme-name` to the client or project name
* after composer and npm have installed all dependencies, running `gulp` will start Watch tasks for you and minify JS and SCSS->CSS into assets folder
* ?????
* profit
* **NOTE:** if using ACF flexible content beautifier, add thumbnails from designs into `/assets/bea-beautiful-flexible` folder with the naming convention -> Flexible Key (offset_content) but with _DASHES_ instead of underscores and the file extension (.jpg or .png) -> (offset-content.jpg)

* delete everything above this line and fill in the info below by replacing the double underscore text, to keep track of projects
___

## __Project Name__
### __Client Name__

### __Account Manager__

### Developers:
* __Dev__

### Designers:
* __Designer__
