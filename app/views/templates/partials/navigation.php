{% if auth  %}
<div class="main-heading">
  <p>
    Hello, {{ auth.getFullNameorUsername() }}

  </p>
</div>
{% endif %}
