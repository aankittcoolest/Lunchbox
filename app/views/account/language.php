{% extends 'templates/default.php' %}

{% block title %} Change Language {% endblock %}

{% block content %}

<form class="" action="{{ urlFor('account.language.post') }}" method="post">
    <select class="" name="language">
        <option value="en-us">English</option>
        <option value="ja-jp">日本語</option>
    </select>

    <input type="submit" name="Submit" value="Change Language">
</form>




{% endblock %}
