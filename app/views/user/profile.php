{% extends 'templates/default.php' %}

{% block title %} {{ user.getFullNameOrUsername }} {% endblock %}

{% block content %}

{% if records %}

<div class="panel panel-default">
  <div class="panel-body">
    <h2><span class="label label-default">Your Order History</span></h2><br><br>
      <table class="table table-striped table-fonts" >
        <tr style='background: #B3C0CC;'>
          <th>Serial Number</th>
          <th>Lunch Category</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>

      {% for record in records %}
        <tr >
          <td>{{ record.id }}</td>
          <td>{{ record.category_name }}</td>
          <td>{{ record.amount }}</td>
          <td>{{ record.date }}</td>
        </tr>
      {% endfor %}
        </table>
  </div>
</div>



  {% else %}
    <h2><span class="label label-default">It's empty out here!</span></h2>
  {% endif %}


{% endblock %}
