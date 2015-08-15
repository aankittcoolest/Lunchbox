<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Website | {% block title %}{{ 'Welcome' }}{% endblock %}</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/app.css" >
    <link rel="stylesheet" href="css/bootstrap-select.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src='../js/main.js'></script>
    <script src='../js/bootstrap-select.js'></script>
  </head>
  <body>

    {% if auth %}
        <p>
          Hello {{  auth.getFullNameorUsername }}
        </p>
    {% else %}
        <p>
          Hello there,
        </p>
    {% endif %}

    {% block content %}
    {% endblock %}
    
  </body>
</html>
