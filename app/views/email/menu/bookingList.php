{% extends 'email/templates/default.php' %}

{% block content %}
  <p>
    We got the following bookings for today!
  </p>

  <table class="table table-striped" rules="all" style="border-color: #666;" cellpadding="10">
    <tr style='background: #eee;'>
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
{% endblock %}
