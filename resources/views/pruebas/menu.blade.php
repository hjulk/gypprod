<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-12">
                <a href="{{url('pruebas')}}">
                    {{-- <script src="{{asset("js/logoPruebas.js")}}"></script> --}}
                    {{-- <picture tabindex="0">
                        <source srcset="{{asset("images/logo_header.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/logo_header.png")}}" type="image/png"/> --}}
                        <img src="{{asset("images/logo_header.webp")}}" id="logoNavbar" alt="Logo menu" tabindex="0"/>
                    {{-- </picture> --}}
                </a>
                <nav class="site-navigation text-right ml-auto " role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <li id="liMenu"><a href="{{url('pruebas')}}" class="nav-link" id="linkHome">Inicio</a></li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">Atención al Ciudadano</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="{{url('pruebas/contacto')}}" class="nav-link">Contáctenos</a></li>
                                <li><a href="{{url('pruebas/notificacionAviso')}}" class="nav-link">Notificación por Aviso</a></li>
                                <li class="has-children">
                                    <a href="" class="nav-link">Peticiones, quejas y reclamos</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="https://bogota.gov.co/sdqs/crear-peticion" class="nav-link" target="_blank">Registrar su PQRS</a></li>
                                        <li><a href="https://bogota.gov.co/sdqs/consultar-peticion" class="nav-link" target="_blank">Consulte su PQRS en Bogotá te Escucha</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('pruebas/preguntasFrecuentes')}}" class="nav-link">Preguntas Frecuentes</a></li>
                            </ul>
                        </li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">GyP</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="{{url('pruebas/normatividad')}}" class="nav-link">Normatividad</a></li>
                                <li><a href="{{url('pruebas/nosotros')}}" class="nav-link">Nosotros</a></li>
                                <li><a href="{{asset("images/gyp/organigrama/Organigrama.pdf")}}" target="_blank" title="Organigrama" class="nav-link">Organigrama</a></li>
                            </ul>
                        </li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">Servicios</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="{{url('pruebas/servicios/beneficios')}}" class="nav-link">Beneficios</a></li>
                                <li><a href="{{url('pruebas/servicios/custodiaSegura')}}" class="nav-link">Custodia Segura</a></li>
                                <li><a href="{{url('pruebas/servicios/gruas')}}" class="nav-link">Grúas</a></li>
                                <li><a href="{{url('pruebas/servicios/monitoreoCamaras')}}" class="nav-link">Monitoreo Cámaras</a></li>
                                {{-- <li><a href="{{url('pruebas/servicios/nuestrosServicios')}}" class="nav-link">Nuestros Servicios</a></li> --}}
                                <li><a href="{{url('pruebas/servicios/procesoInmovilizacion')}}" class="nav-link">Proceso Inmovilización</a></li>
                                <li><a href="{{url('pruebas/servicios/procesoRetiro')}}" class="nav-link">Proceso Retiro</a></li>
                                <li><a href="{{url('pruebas/servicios/tarifas')}}" class="nav-link">Tarifas</a></li>
                            </ul>
                        </li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">Trámites</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="{{url('pruebas/consultaLiquidacion')}}" class="nav-link">Consulta Inmovilización</a></li>
                                <li><a href="{{url('pruebas/pagoLinea')}}" class="nav-link">Pago en Línea</a></li>
                                <li><a href="{{url('pruebas/puntosAtencion')}}" class="nav-link">Puntos de Atención</a></li>
                            </ul>
                        </li>
                        <li id="liMenu"><a href="{{url('pruebas/trabajo')}}" class="nav-link" id="linkHome">Trabaje con Nosotros</a></li>
                    </ul>
                </nav>
            </div>
            <div class="toggle-button d-inline-block d-lg-none">
                <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>
        </div>
    </div>
</header>
