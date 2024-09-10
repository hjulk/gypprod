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
                    <h2 id="titlePreguntaFrecuente">¿Con cuántos vehículos tipo grúa cuenta el concesionario GYP para la inmovilización de vehículos en Bogotá D.C.?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="preguntaFrecuenteText">El Concesionario GyP cuenta con 125 vehículos tipo grúa.</p>
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
