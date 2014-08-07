s15-p4
======

## Live URL
http://dwa15-p4.herokuapp.com/

## Description
Fourth and final assignment for DWA15, some sort of a poor man's shared blog.

## Details for teaching team
Not everything in the interface works. Turns out I didn't have enough time to implement everything.
I made some choices about technology that we didn't follow in class. For example, after reading this [blog post](http://culttt.com/2014/06/30/getting-started-doctrine-2-laravel/) on Eloquent versus Doctrine, I decided to go with the latter. Though Doctrine supports Migrations, they're not in this project (not in file form at least) since I couldn't get it running with Artisan. Instead of setting up the database manually, I let Doctrine generate my schema based on my models/entities.

Also not in this project is the form builder. I found it to be cumbersome to generate complex forms using Bootstrap. So instead I built the form manually and just echo'd the CSRF token inside.

The login screen has no client-side validation, just to show that server-side validation also works. The register form has both, but you won't see the server validation unless you use an old browser.

## Outside code
* Bootstrap: http://getbootstrap.com/
* Flat UI: http://designmodo.github.io/Flat-UI/
* Doctrine bridge: https://github.com/mitchellvanw/laravel-doctrine/
* jQuery: http://jquery.com