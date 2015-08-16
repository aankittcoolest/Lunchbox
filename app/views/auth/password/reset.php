{% extends 'templates/default.php' %}

{% block title %} Reset  Password{% endblock %}

{% block content %}



<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title"><div class="form-headings">
                            {{ lang.headings.new_password }}
                        </div></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('password.reset.post') }}?email={{ email }}&identifier={{ identifier|url_encode }}" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.new_password }}" type="text" name="password" id="password">
                                    <h4>  {% if errors.has('password') %}{{ errors.first() }}{% endif %}</h4>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.confirm_password }}" type="text" name="password_confirm" id="passwordconfirm">
                                    <h4>  {% if errors.has('password_confirm') %}{{ errors.first() }}{% endif %}</h4>
                                </div>
                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
                                <input class="btn btn-md btn-success" type="submit"  value="{{ lang.submit.reset }}">
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>


{% endblock %}
