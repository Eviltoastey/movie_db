## Install guide (local set up)
1. install xampp or wampp
2. go to the htdocs folder in xampp or wampp
3. unzip this project there
4. run the Apache server and Mysql server

NOTE: to set the DB and API info you need to copy the .env.example file!

-- initialize database
1. open PhpMyAdmin
2. create a new database.
3. set db credentials in .env file
3. open your terminal and run php artisan migrate

You can now enjoy this project! You just need to fix some popcorn yourself..

## Set 3rd party API's

1. Wet the API keys in the .env file.
More info about this in the following section:

-- youtube API
follow the guide from google
https://developers.google.com/youtube/v3/getting-started


-- The movie DB
foolow the guide from the movie DB
https://developers.themoviedb.org/3


## API ROUTES
*collection of trending movies*
{base_url}/*project_name*/public/api/movies

*A random movie*
{base_url}/*project_name*/public/api/movie


## Used 3th party API's
*movie data*
The movie database API

*trailers*
Youtube API v3
