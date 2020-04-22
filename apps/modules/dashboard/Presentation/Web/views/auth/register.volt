{% extends 'layout.volt' %}

{% block title %}Register{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<h1> Daftar </h1>
<p>{{ this.flashSession.output() }}</p>
<form method="POST" action="{{ url('register/submit') }}">
    {# CSRF Token #}
    <input type='hidden' name="{{ this.security.getTokenKey() }}" value="{{ this.security.getToken() }}" />
    <div class="form-group">
        <label for="input-username">Username</label>
        <input type="text" name="username" class="form-control" id="input-username" placeholder="new username">
    </div>
    <div class="form-group">
        <label for="input-email">Email address</label>
        <input type="email" name="email" class="form-control" id="input-email" placeholder="name@example.com">
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