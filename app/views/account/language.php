{% extends 'templates/default.php' %}

{% block title %} Change Language {% endblock %}

{% block content %}

<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title"><div class="form-headings">
                            {{ lang.headings.change_language }}
                        </div></h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ urlFor('account.language.post') }}" method="post">
                            <fieldset>
                                <div class="form-group">
                                  <select  class="form-control" name="language" >
                                    <option value="en-us">English</option>
                                    <option value="ja-jp">日本語</option>
                                  </select>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
                                <input class="btn btn-md btn-success" type="submit" name="submit" value="{{ lang.submit.change_language }}">
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>




{% endblock %}
