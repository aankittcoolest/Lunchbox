{% extends 'templates/default.php' %}

{% block title %} Home {% endblock %}

{% block content %}

{% if mail_send and today == 'Friday'  %}

      <h4><label class="label label-danger">Sorry, we have stopped taking reservations for this week.</label></h4>

{% else %}

{% if not category %}

<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Select your meal</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('reserve.post') }}" method="post">
                            <fieldset>

                                {% if not category %}

                                <div class="form-group">
                                  <select  class="form-control" name="categories" >
                                    {% for category in categories %}
                                      <option value="{{ category.id }}">{{ category.name }}</option>
                                      {% endfor %}
                                  </select>
                                </div>



                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                <input class="btn btn-sm btn-success" type="submit" name="submit" value="Select this category">

                            </fieldset>

                            {% endif %}
                        </form>
                    </div>
                </div>
    </div>
</div>
{% endif %}


{% if category %}
{% if mail_send %}
<div class="center-align">
    <h4><label class="label label-warning ">Sorry, we have stopped taking reservations for today.</label></h4>
</div>

{% endif %}
<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Confirm your meal</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('reserve.post') }}" method="post">
                            <div class="center">
                              <fieldset>

                                  <div class="center-align">
                                      <h3><label class="label label-default " for="category" name="category">{{ category }}</label></h3>
                                  </div>

                                  <div class="form-group">

                                    <select  class="form-control" name="order" >
                                        {% if not mail_send  %}
                                        <option value="1">Book lunch for today</option>
                                        {% endif %}
                                        {% if  today != 'Friday' %}
                                        <option value="2">Book lunch for tomorrow</option>
                                        <option value="3">Book lunch for whole week</option>
                                        {% endif %}
                                    </select>
                                  </div>

                                  <div class="form-group">
                                  <h5><a  href="http://www.tamagoya.co.jp/menu_list.html" target="_blank">See detailed menu for today</a></h5>
                                </div>
                                  <div class="center-align">
                                  <input class="btn btn-sm btn-danger" type="submit" name="cancel" value="I would like to think again!">

                                  <input class="btn btn-sm btn-success" type="submit" name="confirm" value="Let's book the order!">
                                </div>
                              </fieldset>
                            </div>


                        </form>
                    </div>
                </div>
    </div>
</div>
{% endif %}

{% endif %}



{% endblock %}
