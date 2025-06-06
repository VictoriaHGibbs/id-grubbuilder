# Grubbuilder

## Purpose

Grubbuilder is my student capstone project for the Spring 2025 semester. It is a recipe sharing site. I plan to continue building this out as I had many more ideas for it that I unfortunately didn't have time to implement. 

- [ ] Comment/Reviews on recipes.
- [ ] Friend and follower capabilities.
- [ ] Nutrition facts API integration that live updates with ingredient removal. 
- [ ] Better User profile pages.
- [ ] Fully edit recipes.
- [ ] Drag and drop to change order for ingredients, directions and images on recipes.


## Technology used

Grubbuilder is mostly written in PHP and also uses some JavaScript. The database portion uses MySQL. A majority of the styling is through BootStrap5. Icons are with Fontawesome. It uses Google reCAPTCHA V2 for sign up protection. DOMPDF is used for the pdf printing.

## Setup

You will need to:
- Get and set up a [fontawesome](https://fontawesome.com/) account. Line 12 in both `private/shared/public_header.php` and `private/shared/user_header.php` will need to be replaced by your own link to work.

- Get an account through [Google for the recaptcha V2](https://developers.google.com/recaptcha/intro). Replace `data-sitekey` on line 49 in `public/active_record/users/form_fields.php` with your own. For your secret key, make a file `private/api_keys.php` with the following:
```
<?php

// Define reCaptcha secret key
define("RECAPTCHA_V2_SECRET_KEY", "YOUR SECRET KEY GOES HERE");

```

- For local database credentials that work with the local SQL database creation script, make a file `private/db_credentials.php` with the following:
```
<?php
  define("DB_SERVER", "localhost");
  define("DB_USER", "grubUser");
  define("DB_PASS", "Nomnom123!");
  define("DB_NAME", "grub");
```

- Uploading images for users or recipes will go into an `uploads` file in the root. 
