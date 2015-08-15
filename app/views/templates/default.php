<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Website | {% block title %}{{ 'Welcome' }}{% endblock %}</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="/lunchbox/authentication/public/css/app.css" >

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  </head>
  <body>

            <nav class="top-nav">
                  <div class="logo">
                    <a href="{{ urlFor('home') }}"><img src="/lunchbox/authentication/public/images/logo/logo.png" alt="" /></a>

                  </div>

                  <ul class="top-nav-items">
                    <li><a href="{{ urlFor('home') }}">{{ lang.nav_bar.menu }}</a></li>
                    {% if  auth.isAdmin %}
                    <li><a href="{{ urlFor('admin.example') }}">Admin area</a></li>
                    <li><a href="{{ urlFor('new_menu') }}">New Menu</a></li>
                    <li><a href="{{ urlFor('new_category') }}">New Category</a></li>
                    <li><a href="{{ urlFor('logout') }}">{{ lang.nav_bar.logout }}</a></li>
                    {% endif %}
                    {% if auth and not auth.isAdmin  %}
                    <li><a href="{{ urlFor('user.profile', {username: auth.username}) }}">{{ lang.nav_bar.profile }}</a></li>
                    <li><a href="{{ urlFor('auth.password.change') }}">{{ lang.nav_bar.change_password }}</a></li>
                    <li><a href="{{ urlFor('account.profile') }}">{{ lang.nav_bar.update_profile }}</a></li>
                    <li><a href="{{ urlFor('logout') }}">{{ lang.nav_bar.logout }}</a></li>



                    {% elseif not auth %}
                  <li><a href="{{ urlFor('register') }}">{{ lang.nav_bar.register }}</a></li>
                  <li><a href="{{ urlFor('login') }}">{{ lang.nav_bar.login }}</a></li>
                  {% endif %}

                  <div class="top-nav-items-right">
                      <a  class="button medium success" href="{{ urlFor('reserve') }}">{{ lang.nav_bar.reserve }}</a>
                      <a href="{{ urlFor('account.language') }}">{{ lang.nav_bar.change_language }}</a>
                  </div>


                  </ul>




        </nav>
            {% include 'templates/partials/messages.php' %}
            {% include 'templates/partials/navigation.php' %}
            {% block content %}{% endblock %}

  </body>
</html>
