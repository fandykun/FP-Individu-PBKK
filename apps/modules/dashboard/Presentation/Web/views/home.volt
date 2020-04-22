{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<h1> masuk </h1>
{{ this.security.getTokenKey() }}<br>
{{ this.security.getToken() }}
{% endblock %}

{% block scripts %}

{% endblock %}