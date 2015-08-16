{% extends 'templates/default.php' %}

{% block title %} Recover Password {% endblock %}

{% block content %}

  <div class="col-md-12">
      <div class="modal-dialog" style="margin-bottom:0">
          <div class="modal-content">
                      <div class="panel-heading">
                          <h3 class="panel-title"><div class="form-headings">
                              {{ lang.headings.current_email }}
                          </div></h3>
                      </div>
                      <div class="panel-body">
                          <form action="{{ urlFor('password.recover.post') }}" method="post" autocomplete="off">
                              <fieldset>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="{{ lang.placeholders.email }}" type="text" name="email" id="email"{% if request.post('email') %}value="{{ request.post('email') }}"{% endif %}>
                                      <h4>  {% if errors.has('email') %}{{ errors.first('email') }}{% endif %}</h4>
                                  </div>

                                  <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                  <input class="btn btn-md btn-success" type="submit"  value="{{ lang.submit.request_reset }}">

                              </fieldset>
                          </form>
                      </div>
                  </div>
      </div>
  </div>

{% endblock %}
