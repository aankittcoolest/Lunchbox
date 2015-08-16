{% if auth  %}
<div class="main-heading">
  <p>
    {{ lang.main_heading.welcome }}, {{ auth.getFullNameorUsername() }} {{ lang.main_heading.honour }}

  </p>
</div>
{% endif %}
