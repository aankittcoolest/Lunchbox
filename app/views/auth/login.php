{% extends 'templates/default.php' %}

{% block title %}Login{% endblock %}

{% block content %}

<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title"><div class="form-headings">
                            {{ lang.headings.login }}
                        </div></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('login.post') }}" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.identifier }}" name="identifier"  type="text" id="identifier" autofocus="">
                                    <h4>{% if errors.first('identifier') %}{{  errors.first('identifier') }}{% endif %}</h4>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.login_password }}" name="password" type="password" id="password">
                                      <h4>{% if errors.first('password') %}{{  errors.first('password') }}{% endif %}</h4>
                                </div>
                                <div class="checkbox">
                                    <label>
                                    <h5><input name="remember" type="checkbox"  name="remember" id="remember">{{ lang.inputs.remember_me }}</h5>
                                    </label>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                <input class="btn btn-sm btn-success" type="submit"  value="{{ lang.submit.login }}">
                                  <h5><a href="{{ urlFor('password.recover') }}">{{ lang.links.forgot_password }}</a></h5>

                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>


{% endblock %}
