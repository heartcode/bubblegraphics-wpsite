## Wordpress details

- Wordpress 3.7.1
- Metabox v4.3.6
- AddThis v3.5.3
- Wordpress Importer v0.6.1

## Ruby version

	2.0.0-p247

### Installing the Ruby gems

First of all install Bundler
  
  $ gem install bundler

Each theme has its own Gemfile to keep them separate from each other
  
	$ bundle install --gemfile public/wp-content/themes/bubblegraphics_2.0.0/Gemfile
	$ bundle update

Install bourbon
  
	$ bundle exec bourbon install --path=assets-src/stylesheets-scss/vendor
	
Pre-compile SASS files using SASS:

	$ bundle exec sass --watch assets-src/stylesheets-scss:assets-src/stylesheets


### Handling assets

All development asset sources are under the `assets-src` folder.

All production assets are under the `assets` folder including:

- Fonts
- Images
- Compiled (compressed, minified and uglified) JavaScript files
- Compiled (compressed, minified and uglified) Stylesheets

### Compiling the assets

Guard has all the settings to compile the SASS and the JavaScript files as they are being edited and saved.

Start guard:

	$ bundle exec guard

### Ignored project files and folders

- Projects
- Compiled JavaScript and stylesheet files

