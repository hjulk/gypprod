@extends("pruebas.layout")

@section('titulo')
- Preguntas Frecuentes
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h3 id="tituloSubPagina">Preguntas frecuentes</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row" id="rutaPagina">
                <div class="col-md-12">
                    <a href="{{ url('/') }}">Inicio</a>
                    <span id="iconoRutaPagina"><b>></b></span> Atención al Ciudadano
                    <span id="iconoRutaPagina"><b>></b></span> <a href="preguntasFrecuentes" id="subruta"> Preguntas Frecuentes</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 id="titlePreguntaFrecuente">¿Dónde puedo denunciar actos de corrupción e irregularidades relacionadas con la operación de la grúa o del personal del patio, durante el izaje, traslado y custodia del vehículo?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="preguntaFrecuenteText">
                        A través del correo electrónico <a href="mailto:denuncias@gypbogota.com" class="linkPregunta"><b>denuncias@gypbogota.com</b></a> o del buzón ubicado en el patio (Parqueadero Autorizado No. 01).
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <a href="preguntasFrecuentes" class="btn btn-informacion" id="idBotonPregunta">Volver</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')


@endsection
