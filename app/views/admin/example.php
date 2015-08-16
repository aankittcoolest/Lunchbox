{% extends 'templates/default.php' %}

{% block title %} Admin example {% endblock %}

{% block content %}

{% if todays_record %}

<table class="table table-striped table-fonts" >
  <tr style='background: #B3C0CC;'>
    <th><div class="center-align">{{ lang.table_headings.serial_number }}</div></th>
    <th><div class="center-align">{{ lang.table_headings.customer_name }}</div></th>
    <th><div class="center-align">{{ lang.table_headings.category }}</div></th>
    <th><div class="center-align">{{ lang.table_headings.amount }}</div></th>
  </tr>

{% for today_record in todays_record %}
  <tr >
    <td><div class="center-align">{{ today_record.id }}</div></td>
    <td><div class="center-align">{{ today_record.username }}</div></td>
    <td><div class="center-align">{{ today_record.category_name }}</div></td>
    <td><div class="center-align">{{ today_record.amount }}</div></td>
  </tr>
{% endfor %}
  </table>
{% else %}

<div class="global">
    <span  class="label label-danger">Oops,there are no orders for today.</span>
</div>


{% endif %}


<nav class="navbar navbar-default navbar-fixed-bottom">
  <form class="" action="{{ urlFor('admin.example.post') }}" method="post">
    <div class="col-md-12 text-center">
      <input class="btn btn-primary" type="submit" name="submit" value="{{ lang.submit.stop_reservations }}">
      </div>
  </form>
</nav>





{% endblock %}
