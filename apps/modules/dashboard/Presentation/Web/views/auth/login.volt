{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<h1> masuk </h1>
<p>{{ this.flashSession.output() }}</p>
<form method="POST" action="{{ url('login/submit') }}">
    {# CSRF Token #}
    <input type='hidden' name="{{ this.security.getTokenKey() }}" value="{{ this.security.getToken() }}" />
    <div class="form-group">
        <label for="input-key">Username / Email</label>
        <input type="text" name="keyValue" class="form-control" id="input-key" placeholder="your username / email">
    </div>
  <div class="form-group">
    <label for="input-password">Password</label>
    <input type="password" name="password" class="form-control" id="input-password" placeholder="your password">
  </div>
    <button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
  
</form>
{% endblock %}

{% block scripts %}

{% endblock %}