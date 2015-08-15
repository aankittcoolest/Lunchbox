{% extends 'templates/default.php' %}

{% block title %} Admin example {% endblock %}

{% block content %}

{% if todays_record %}

<table class="table table-striped table-fonts" >
  <tr style='background: #B3C0CC;'>
    <th>Serial Number</th>
    <th>Customer Name</th>
    <th>Lunch Category</th>
    <th>Amount</th>
  </tr>

{% for today_record in todays_record %}
  <tr >
    <td>{{ today_record.id }}</td>
    <td>{{ today_record.username }}</td>
    <td>{{ today_record.category_name }}</td>
    <td>{{ today_record.amount }}</td>
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
      <input class="btn btn-primary" type="submit" name="submit" value="Stop taking lunch reservations for today.">
      </div>
  </form>
</nav>





{% endblock %}
