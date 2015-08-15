{% extends 'templates/default.php' %}

{% block title %} Change password {% endblock %}

{% block content %}


<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enter your email address to start your password recovery.</h3>
                    </div>
                    <div class="panel-body">
                        <form class="{{ urlFor('password.change.post') }}"  method="post" autocomplete="off">

                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Old Password" type="password" name="password_old" id="password_old">
                                  <h4 class="error-heading">  {% if errors.has('password_old') %}{{ errors.first('password_old') }}{% endif %}</h4>
                              </div>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="New Password" type="password" name="password" id="password">
                                    <h4 class="error-heading">  {% if errors.has('password') %}{{ errors.first('password') }}{% endif %}</h4>
                                </div>


                                <div class="form-group">
                                    <input class="form-control" placeholder=" Password confirm" type="password" name="password_confirm" id="password_confirm">
                                    <h4 class="error-heading">  {% if errors.has('password_confirm') %}{{ errors.first('password_confirm') }}{% endif %}</h4>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-sm btn-success" type="submit"  value="Request reset">
                                  <h5><a href="{{ urlFor('password.recover') }}">Forgot your password?</a></h5>

                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>


{% endblock %}
