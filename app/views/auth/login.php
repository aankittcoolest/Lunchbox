{% extends 'templates/default.php' %}

{% block title %}Login{% endblock %}

{% block content %}

<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('login.post') }}" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="identifier"  type="text" id="identifier" autofocus="">
                                    <h4>{% if errors.first('identifier') %}{{  errors.first('identifier') }}{% endif %}</h4>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="password">
                                      <h4>{% if errors.first('password') %}{{  errors.first('password') }}{% endif %}</h4>
                                </div>
                                <div class="checkbox">
                                    <label>
                                    <h5><input name="remember" type="checkbox" value="Remember Me"  name="remember" id="remember">Remember Me</h5>
                                    </label>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                <input class="btn btn-sm btn-success" type="submit"  value="Login">
                                  <h5><a href="{{ urlFor('password.recover') }}">Forgot your password?</a></h5>

                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>


{% endblock %}
