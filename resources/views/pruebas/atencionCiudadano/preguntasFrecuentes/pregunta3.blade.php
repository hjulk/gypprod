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
                    <h2 id="titlePreguntaFrecuente">¿Qué tipos de grúas tiene el concesionario GYP para la inmovilización de vehículos en Bogotá D.C.?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="preguntaFrecuenteText">El Concesionario GyP cuenta con vehículos tipo grúa de las siguientes características:&nbsp;
                        <br>
                        <ul>
                            <li><b>GANCHO EXTRAPESADO:</b> Con capacidad para transportar vehículos de hasta 16 toneladas<br>
                            </li><br>
                            <li><b>GANCHO PESADO:</b> Con capacidad para transportar vehículos de hasta 10 toneladas<br>
                            </li><br>
                            <li><b>GRÚAS DE PLANCHÓN:</b> Grúas con plataforma de transporte de vehículos livianos, medianos y motocicletas<br>
                            </li><br>
                            <li><b>GRÚAS DE PLANCHÓN PARA MOTOCICLETAS:</b> Grúas con plataforma para el transporte de motocicletas.<br>
                            </li><br>
                            <li><b>GRÚAS DE IZAJE LATERAL:</b> Grúas con dispositivo lateral para izaje de vehículos livianos y medianos.</li>
                        </ul>
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
