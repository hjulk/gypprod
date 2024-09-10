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
                    <h2 id="titlePreguntaFrecuente">¿Qué debo hacer si no estoy de acuerdo con el estado del vehículo, en el momento del retiro del patio (Parqueadero Autorizado No. 01)?</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="preguntaFrecuenteText">
                        En caso de inconformidades con el estado del vehículo podrá dirigirse a la Oficina de Atención al Usuario del patio (Parqueadero Autorizado No. 01) y realizar la reclamación o queja de manera verbal o escrita.<br><br>
                        <b>Verbal</b><br>
                        Uno de los encargados se desplazará hasta el lugar de parqueo o ubicación del vehículo para realizar el video de reclamación.<br>
                        Se verificará a través del registro fílmico, el estado del vehículo antes del izaje y al ingreso al Patio (Parqueadero Autorizado No. 01) para determinar si la responsabilidad en el daño es atribuible al Concesionario y, proceder a realizar una conciliación económica o envió al taller para el respectivo arreglo.<br><br>
                        <b>Escrita</b><br>
                        La Oficina de Atención al Usuario realizará la respectiva investigación y en un término no superior a quince (15) días hábiles emitirá respuesta.  En caso de ser favorable, se solicitará la presentación de dos (2) cotizaciones para realizar el proceso de conciliación.<br>
                        En caso de no llegar a un acuerdo con la ciudadana o el ciudadano, se procederá a presentar la solicitud de conciliación ante la Personería de Bogotá para que sea un tercero quien resuelva el conflicto.
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
