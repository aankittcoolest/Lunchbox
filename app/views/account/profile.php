{% extends 'templates/default.php' %}

{% block title %} Update profile {% endblock %}

{% block content %}

<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title"><div class="form-headings">
                            {{ lang.headings.update_profile }}
                        </div></h3>
                    </div>
                    <div class="panel-body">
                        <form  action="{{ urlFor('account.profile.post') }}" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.first_name }}" type="text" name="first_name" id="first_name" value="{{ request.post('first_name') ? request.post('first_name') : auth.first_name }}">
                                    <h4> {% if errors.has('first_name') %}{{ errors.first('first_name') }}{% endif %}</h4>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ lang.placeholders.last_name }}" type="text" name="last_name" id="last_name" value="{{ request.post('last_name') ? request.post('last_name') : auth.last_name }}">
                                    <h4> {% if errors.has('first_name') %}{{ errors.first('first_name') }}{% endif %}</h4>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                <input class="btn btn-md btn-success" type="submit"  value="{{ lang.submit.update_profile }}">


                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>

{% endblock %}
