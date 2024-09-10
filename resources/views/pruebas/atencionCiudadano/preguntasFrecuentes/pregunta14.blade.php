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
                    <h2 id="titlePreguntaFrecuente">¿En qué casos el vehículo inmovilizado debe salir del patio en grúa?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="preguntaFrecuenteText">
                        Por orden de la autoridad de tránsito, cuando la falta que dio origen a la inmovilización no pueda ser subsanada en el patio (Parqueadero Autorizado No. 1) ejemplo: técnico-mecánica vencida; cuando la persona autorizada no cuenta con licencia de conducción; en caso de vehículos inmovilizados por gases, prueba ambiental y fuga de aceite, y para los taxis cuando tienen el tarjetón vencido.
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
