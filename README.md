Session user
=================
2016-11-15



Simple implementation of a session user in php.



Goal
--------
Re-use the User.php class, so you don't have to type it.



How
---------

Include the User class (User.php file of this repository) in your project.


Then, in your init file (or equivalent), include the following code:

```php

session_start();

// ...
define('USER_SESSION_TIMEOUT', 60*5); // number of seconds before session times out


// ...
User::refresh();
if(array_key_exists('disconnect', $_GET)){
    User::disconnect();
}

```

This code will do the following: 

- start the session, which is needed to memorize a connected user's data
- define the user's session timeout, which lasts 5 minutes by default (i.e. if the user has no activity during 5 minutes, the next page refresh will log her out)
- listen for a disconnect key to be passed in the $_GET array, and if found, disconnect the user (for instance http://mysite.com/any/page/home?disconnect=1 does the trick)



One last thing: in order to connect the user for the first time, go to the page where she posts the login form,
and upon successful credentials, use the code below to connect the user:

```php
User::connect($item);
```



Boring details
----------------------

Note that you need to adapt the User class code with your keys.
In my case, I had a user with the following fields: id, pseudo, url_photo...

The static functions getPseudo, getId and getUrlPhoto are used to display the login bar (when the user is connected) with the user's pseudo and avatar, and a link to her profile, all that at the top of the website.





Related
===================
You might be interested in those other scripts as well:

- https://github.com/lingtalfi/sign-up-form
- https://github.com/lingtalfi/sign-in-form






