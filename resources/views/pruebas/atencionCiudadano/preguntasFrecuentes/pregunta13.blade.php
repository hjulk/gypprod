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
                    <h2 id="titlePreguntaFrecuente">¿Dónde puedo pagar los servicios de grúa y patio?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="preguntaFrecuenteText">
                        Luego de liquidar el servicio por concepto de grúa y parqueadero, puede realizar el pago a través de los siguientes medios:<br>
                        <ul>
                            <li><b>Electrónico</b><br>
                                A través de Pago Seguro en Línea (PSE) habilitado en la página web de la Secretaría Distrital de Movilidad <a href="https://www.movilidadbogota.gov.co" target="_blank" class="linkPregunta"><b>www.movilidadbogota.gov.co</b></a>
                            </li><br>
                            <li>
                                <b>Efectivo</b><br>
                                <b>Banco de Occidente.</b> En la red de oficinas del banco, incluyendo el Centro de Servicios de Movilidad Calle 13, en los horarios de atención establecidos (sean o no clientes del Banco de Occidente).
                            </li><br>
                            <li>
                                <b>Corresponsales no bancarios</b><br>
                                Tarjeta de crédito en los Supermercados Éxito, Surtimax, Súper Inter, Carulla y banco del Centro de Servicios de Movilidad Calle 13.
                            </li>
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
