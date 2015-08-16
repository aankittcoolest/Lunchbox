{% extends 'templates/default.php' %}

{% block title %} {{ user.getFullNameOrUsername }} {% endblock %}

{% block content %}

{% if records %}

<div class="panel panel-default">
  <div class="panel-body">
    <h2><span class="label label-default">{{ lang.headings.order_history }}</span></h2><br><br>
      <table class="table table-striped table-fonts" >
        <tr style='background: #B3C0CC;'>
          <th><div class="center-align">{{ lang.table_headings.serial_number }}</div></th>
          <th><div class="center-align">{{ lang.table_headings.category }}</div></th>
          <th><div class="center-align">{{ lang.table_headings.amount }}</div></th>
          <th><div class="center-align">{{ lang.table_headings.date }}</div></th>
        </tr>

      {% for record in records %}
        <tr >
          <td><div class="center-align">{{ record.id }}</div></td>
          <td><div class="center-align">{{ record.category_name }}</div></td>
          <td><div class="center-align">{{ record.amount }}</div></td>
          <td><div class="center-align">{{ record.date }}</div></td>
        </tr>
      {% endfor %}
        </table>
  </div>
</div>



  {% else %}
    <h2><span class="label label-default">It's empty out here!</span></h2>
  {% endif %}


{% endblock %}
