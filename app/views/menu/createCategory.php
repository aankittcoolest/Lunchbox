{% extends 'templates/default.php' %}

{% block title %} Create new Menu {% endblock %}

{% block content %}




<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title"><div class="form-headings">
                            {{ lang.headings.new_category }}
                        </div></h3>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ urlFor('new_category.post') }}" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.category_name }}" name="category_name"  type="text" id="category_name" autofocus="">
                                    <h4>{% if errors.has('category_name')%}{{ errors.first('category_name') }}{% endif %}</h4>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.amount }}" name="amount"  type="text" id="amount" autofocus="">
                                    <h4>{% if errors.has('amount')%}{{ errors.first('amount') }}{% endif %}</h4>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                <input class="btn btn-md btn-success" type="submit"  value="{{ lang.submit.create }}">


                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
  //called when key is down
  $("#amount").bind("keydown", function (event) {
    if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||

        // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
              // let it happen, don't do anything
              return;
        } else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }
   });
});
</script>

{% endblock %}
