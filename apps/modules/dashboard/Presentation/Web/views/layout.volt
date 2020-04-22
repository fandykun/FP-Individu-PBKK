<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Final Project PBKK">
    <meta name="author" content="Fandy Kuncoro Adianto">
    <title>{% block title %}{% endblock %} | SI-COVID19</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            padding-top: 5rem;
        }

        .content {
            padding: 3rem 1.5rem;
        }

    </style>

    {% block styles %}{% endblock %}

</head>
<body>
    <main role="main" class="container">
        <div class="content">
            {% block content %}{% endblock %}
        </div>
    </main>

    <script src="{{ url('assets/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    {% block scripts %}{% endblock %}
</body>
</html>


