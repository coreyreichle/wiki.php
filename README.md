Wiki.php
========

Wiki.php is a simple cms/wiki script.  You can see it in use here:

* [Thunix Wiki](https://wiki.thunix.net)
* [Ubergeek's Personal Page](https://thunix.net/~ubergeek)

Installation
============

Installation is really only a couple of steps:


* Clone down the repo
* Edit config.php.  The values are pretty self-explantory, but there's also comments explaining
* Edit includes/header.md, includes/footer.md, and includes/sidebar.md

If you are not using apache, you'll need to add in some mechanism for the rewrites to work, unless you don't care about pretty URLs.  But, you will need to keep those in mind when adding links to your documents.

Something along these lines ~should~ work:

    location ~ (/includes/|/media) {
    }

    location / {
      rewrite ^/$ /main;
      rewrite ^/([A-Za-z0-9\/]+)/?$ /wiki.php?page=$1;
    }

    location /index {
      rewrite ^/index\.php$ /wiki.php?page=main;
    }

Once that's all set, you can start editing articles.  Main.md is always the landing page.

Directory Structure
===================

    ./ <-- Doc root
    ./wiki.php <-- main code
    ./media <-- Images and such.  Files here do get get hit by the rewrite rule
    ./articles <-- All of your site's content
    ./includes <-- Support files that make up the layout
      header.md <-- site header
      footer.md <-- site footer
      sidebar.mb <-- site sidebar
    ./config.php <-- Site configuration file
    ./parsedown-{version} <-- The parsedown version used in this engine

Support
=======

Open an issue at [ubergeek/wiki.php](https://tildegit.org/ubergeek/wiki.php/issues).  PRs are also welcomed!

