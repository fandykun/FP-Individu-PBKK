{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

<style>
.kartu {
  width: 300px;
  box-sizing: border-box;
  padding: 2em;
  border-radius: 25px;
  color: white;
  line-height: 25px;
  box-shadow: 5px 5px 10px #ccc;
  float: left;
  margin-right: 1em;
}

.kartu h2 {
    font-weight: 600;
}

.kartu-ungu {
  background: linear-gradient(150deg, #f731db, #4600f1 100%);
}

.kartu-hijau {
  background: linear-gradient(150deg, #39ef74, #4600f1 100%);
}

.kartu-merah {
  background: linear-gradient(150deg, #F5515F, #A1051D 100%);
}

.kartu-kuning {
  background: linear-gradient(150deg, #fad961, #f76b1c 100%);
}

.kartu-biru {
  background: linear-gradient(150deg, #13f1fc, #0470dc 100%);
}
</style>

{% endblock %}

{% block content %}
<p>{{ this.flashSession.output() }}</p>
<div class="text-center mb-5 font-weight-bold">
    <h3> SISTEM INFORMASI COVID-19 (Beta version) </h3>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-3 col-sm-3 kartu kartu-ungu text-center">
        <h5>ODP</h5>
        <h2>1000000</h2>
    </div>
    <div class="col-3 col-sm-3 kartu kartu-hijau text-center">
        <h5>PDP</h5>
        <h2>1000000</h2>
    </div>
    <div class="col-3 col-sm-3 kartu kartu-merah text-center">
        <h5>Positif</h5>
        <h2>1000000</h2>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="col-3 col-sm-3 kartu kartu-kuning text-center">
        <h5>Negatif</h5>
        <h2>1000000</h2>
    </div>
    <div class="col-3 col-sm-3 kartu kartu-biru text-center">
        <h5>Sembuh</h5>
        <h2>1000000</h2>
    </div>
</div>
<div class="text-center">
<h3>Grafik Blabla</h3>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}