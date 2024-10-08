@extends("pruebas.servicios.layout")

@section('titulo')
- Proceso Inmovilización
@endsection

@section('styles')
<link rel="preload" href="{{asset("css/procesoInmovilizacion.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{asset("css/procesoInmovilizacion.css")}}"></noscript>
@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Proceso inmovilización</h2>
            </div>
        </div>
    </div>
</div>
<div class="ftco-cover-1" id="franjaSubpaginaTitulo">
    <div class="container-md" id="franjaRutaPagina">
        <div class="row" id="rutaPagina">
            <div class="col-md-12">
                <a href="{{ url('pruebas/') }}">Inicio</a>
                <span id="iconoRutaPagina"><b>></b></span> <a href="nuestrosServicios" id="subruta"> Servicios</a>
                <span id="iconoRutaPagina"><b>></b></span> Proceso inmovilización
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<section class="ftco-section" id="sectionPage">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 id="titlesubServicios" tabindex="0">Conoce el proceso correcto de inmovilización de un vehículo</h3>
            </div>
        </div>
    </div>
</section>
<br>
<section class="ftco-section" id="sectionPage">
    <div class="container">
        <div id="pasosInmovilizacion1">
            <div>
                <picture tabindex="0">
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_1.webp")}}" type="image/webp"/>
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_1.png")}}" type="image/png"/>
                    <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_1.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                </picture>
            </div>
            <div class="textPR">
                <p id="textProcesoInmovilizacion" tabindex="0">
                    La grúa es solicitada por la autoridad de tránsito desde la ubicación donde el ciudadano cometió la infracción de tránsito.
                </p>
            </div>
        </div>
        <div id="pasosInmovilizacion2" class="reverse">
            <div class="textPR">
                <p id="textProcesoInmovilizacion" tabindex="0">
                    Dirígete al lugar indicado en tu cita con los documentos solicitados para el trámite.
                </p>
            </div>
            <div class="imgPR">
                <picture tabindex="0">
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_2.webp")}}" type="image/webp"/>
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_2.png")}}" type="image/png"/>
                    <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_2.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                </picture>
            </div>
        </div>
        <div id="pasosInmovilizacion1">
            <div>
                <picture tabindex="0">
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_3.webp")}}" type="image/webp"/>
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_3.png")}}" type="image/png"/>
                    <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_3.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                </picture>
            </div>
            <div class="textPR">
                <p id="textProcesoInmovilizacion" tabindex="0">
                    Realiza el pago por concepto de patios y grúas en las entidades bancarias (Banco de Occidente), corresponsales no bancarios o pago electrónico (PSE).
                </p>
            </div>
        </div>
        <div id="pasosInmovilizacion2" class="reverse">
            <div class="textPR">
                <p id="textProcesoInmovilizacion" tabindex="0">
                    Dirígete a nuestro parqueadero Transversal 93 # 53 - 35 con la orden de salida y la liquidación.
                </p>
            </div>
            <div class="imgPR">
                <picture tabindex="0">
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_4.webp")}}" type="image/webp"/>
                    <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_4.png")}}" type="image/png"/>
                    <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_4.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                </picture>
            </div>
        </div>
    </div>
</section>
    {{-- @if($ImgProcesoInmovilizacion)
        @foreach($ImgProcesoInmovilizacion as $images)
            <section class="ftco-section" id="sectionPage">
                <div class="container">
                    <div class="row align-items-center" id="franjaTituloPagina">
                        <div class="col-lg-12">
                            <h3 id="tituloSubPaginaHome">Proceso correcto de inmovilización de un vehículo</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row" id="pageImage">
                        <div class="col-md-12">
                            {!! $images->TEXTO_IMAGEN !!}
                        </div>
                    </div>
                    <div class="row" id="imagesProceso inmovilización">
                        <div class="col-md-12" id="pageImage">
                            @if(strpos($images->UBICACION, '.jpg') !== false)
                                <picture tabindex="0">
                                    <source srcset="../{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                                    <source srcset="../{{ $images->UBICACION }}" type="image/jpg"/>
                                    <img src="../{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Proceso Inmovilizacion"/>
                                </picture>
                            @else
                                <picture tabindex="0">
                                    <source srcset="../{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                                    <source srcset="../{{ $images->UBICACION }}" type="image/png"/>
                                    <img src="../{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Proceso Inmovilizacion"/>
                                </picture>
                            @endif
                            <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                        </div>
                    </div>
                </div>
            </section>
            <br>
        @endforeach
    @endif --}}
    {{-- <script src="{{asset("js/procesoInmovilizacionPruebas.js")}}"></script> --}}
    <br>
@endsection

@section('scripts')

@endsection
