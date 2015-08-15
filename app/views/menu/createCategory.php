{% extends 'templates/default.php' %}

{% block title %} Create new Menu {% endblock %}

{% block content %}




<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create New Category</h3>
                    </div>
                    <div class="panel-body">
                        <form class="" action="{{ urlFor('new_category.post') }}" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Category Name" name="category_name"  type="text" id="category_name" autofocus="">
                                    <h4>{% if errors.has('category_name')%}{{ errors.first('category_name') }}{% endif %}</h4>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Amount" name="amount"  type="text" id="amount" autofocus="">
                                    <h4>{% if errors.has('amount')%}{{ errors.first('amount') }}{% endif %}</h4>
                                </div>

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

                                <input class="btn btn-sm btn-success" type="submit"  value="Submit">


                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>


{% endblock %}
