{% extends 'templates/default.php' %}

{% block title %} Recover Password {% endblock %}

{% block content %}

  <div class="col-md-12">
      <div class="modal-dialog" style="margin-bottom:0">
          <div class="modal-content">
                      <div class="panel-heading">
                          <h3 class="panel-title">Update Profile</h3>
                      </div>
                      <div class="panel-body">
                          <form action="{{ urlFor('password.recover.post') }}" method="post" autocomplete="off">
                              <fieldset>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="E-mail" type="text" name="email" id="email"{% if request.post('email') %}value="{{ request.post('email') }}"{% endif %}>
                                      <h4>  {% if errors.has('email') %}{{ errors.first('email') }}{% endif %}</h4>
                                  </div>

                                  <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                  <input class="btn btn-sm btn-success" type="submit"  value="Request reset">
                                    <h5><a href="{{ urlFor('password.recover') }}">Forgot your password?</a></h5>

                              </fieldset>
                          </form>
                      </div>
                  </div>
      </div>
  </div>

{% endblock %}
