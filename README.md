## About the project

The project involves integrating the LastFM API to enable searching for artists and albums. Users can input their queries, and the application retrieves relevant information from LastFM's database. The retrieved data includes details related to the searched artists and albums, which are then displayed to the users for viewing.

-   clone the project,
-   Run componser install
-   Provide the following parameters in the .env file

    -   GOOGLE_CLIENT_ID=
    -   GOOGLE_CLIENT_SECRET=
    -   GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
    -   LASTFM_API_KEY=
    -   FM_SHARED_SECRET=

-   When everything is set, run php artisan serve and npm run dev
-   The search feature is using Vue Js component

### Features

-   laravel/ui, just for quick bootstrap installation
-   laravel/socialite for social login, am using google
