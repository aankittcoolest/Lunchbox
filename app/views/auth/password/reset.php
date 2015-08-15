{% extends 'templates/default.php' %}

{% block title %} Reset  Password{% endblock %}

{% block content %}



<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enter your email address to start your password recovery.</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('password.reset.post') }}?email={{ email }}&identifier={{ identifier|url_encode }}" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="New Password" type="text" name="password" id="password">
                                    <h4>  {% if errors.has('password') %}{{ errors.first() }}{% endif %}</h4>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" type="text" name="password_confirm" id="passwordconfirm">
                                    <h4>  {% if errors.has('password_confirm') %}{{ errors.first() }}{% endif %}</h4>
                                </div>
                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
                                <input class="btn btn-sm btn-success" type="submit"  value="Change password">
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>


{% endblock %}
