{% if flash.global %}
  <div class="global" id = "hide">
      <span class="label label-success">{{ flash.global }}</span>
  </div>
  {% endif %}

  <script type="text/javascript">
  $(document).ready( function() {
    $('#hide').delay(3000).fadeOut();
  });
</script>
