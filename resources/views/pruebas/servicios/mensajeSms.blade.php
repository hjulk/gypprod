@extends("pruebas.servicios.layout")

@section('titulo')
- Mensaje de texto de alerta
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Mensaje de texto de alerta</h2>
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
                <span id="iconoRutaPagina"><b>></b></span> Mensaje de texto de alerta
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios" tabindex="0">Al ciudadano se le envía un mensaje de texto como señal de alerta informándole que el vehículo ha sido inmovilizado.</h3>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <div class="row">
                @if($ImgMensajes)
                    @foreach($ImgMensajes as $images)
                        @if(strpos($images->UBICACION, '.jpg') !== false)
                            <div class="col-md-6">
                                <picture>
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg"/>
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Mensaje de texto de alerta"/>
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                            </div>
                        @else
                            <div class="col-md-6">
                                <picture>
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                                    <source srcset="{{ $images->UBICACION }}" type="image/png"/>
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Mensaje de texto de alerta"/>
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <br>
@endsection

@section('scripts')

@endsection
