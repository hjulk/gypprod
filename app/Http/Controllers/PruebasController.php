<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GYPBogota;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;


class PruebasController extends Controller
{
    public function Inicio()
    {
        $ObtenerVisitas = GYPBogota::GetVisitas();
        foreach ($ObtenerVisitas as $value) {
            $Visitas = (int)$value->CONTADOR;
        }
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $yearNow = date('Y');
        $ImgInicio = GYPBogota::ImgInicio();
        $imagesFinAno = GYPBogota::imagesFinAno();
        if($imagesFinAno){
            foreach($imagesFinAno as $row){
                $ano = (int)$row->END_YEAR;
            }
        }else{
            $ano = date('Y');
        }
        $fecha_enero = strtotime("01-01-$ano 00:00:00");
        return view('pruebas.index', ['Visitas' => $Visitas, 'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama,'YearNow' => $yearNow,'ImgInicio' => $ImgInicio, 'imagesFinAno' => $imagesFinAno, 'fecha_enero' => $fecha_enero]);
    }

    public function Trabajo()
    {
        $ListaDocumento  = GYPBogota::TipoDocumento();
        $TipoDocumento = array();
        $TipoDocumento[''] = 'Tipo de Documento *';
        foreach ($ListaDocumento as $row) {
            $TipoDocumento[$row->ID_DOCUMENTO] = $row->NOMBRE_DOCUMENTO;
        }
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $ProteccionDatos = PruebasController::ProteccionDatos();
        return view('pruebas.trabajo', ['TipoDocumento' => $TipoDocumento, 'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ProteccionDatos' => $ProteccionDatos]);
    }

    public function MapaSitio()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::OrganigramaMS();
        return view('pruebas.mapaSitio', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    // GYP

    public function Normatividad()
    {
        $PHP_SELF = null;
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $ListarNormatividad = GYPBogota::ListarNormatividades();
        if (!isset($_GET['size'])) {
            echo "<script language=\"JavaScript\">
                document.location=\"$PHP_SELF?size=\"+window.innerWidth;
            </script>";
        } else {
            if (isset($_GET['size'])) {
                if ($_GET['size'] >= 1131) {
                    $Normatividad = null;
                    $cont = 0;
                    if ($ListarNormatividad) {
                        foreach ($ListarNormatividad as $value) {
                            $Normatividad[$cont]['documentos'] = '<section class="ftco-section" id="idSectionNormatividad">
                            <div class="container" id="containerNormatividad">
                            <iframe src="' . str_replace('../', '', $value->UBICACION) . '#toolbar=0" type="application/pdf" width="100%" height="600px"></iframe>
                            </div>
                            </section>';
                            $cont++;
                        }
                    }
                    return view('pruebas.gyp.normatividad', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'Normatividad' => $Normatividad]);
                } else {
                    $NormatividadMobile = null;
                    $contM = 0;
                    if ($ListarNormatividad) {
                        foreach ($ListarNormatividad as &$value) {
                            $NormatividadMobile[$contM]['documentos'] = '
                            <section class="ftco-section" id="idSectionNormatividad">
                                <div class="container" id="containerNormatividad">
                                    <div class="row">
                                        <div class="col-md-3" id="imgNormatividad">
                                            <a href="' . str_replace('../', '', $value->UBICACION) . '" target="_blank">
                                                <img src="images/doc.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <p>' . strtoupper($value->NOMBRE_DOCUMENTO) . '</p>
                                        </div>
                                    </div>
                                </div>
                            </section>';
                            $contM++;
                        }
                    }
                    return view('pruebas.gyp.normatividad', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'Normatividad' => $NormatividadMobile]);
                }
            }
        }
    }

    public function Nosotros()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $yearNow = date('Y');
        return view('pruebas.gyp.nosotros', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama,'YearNow' => $yearNow]);
    }

    // ATENCIÓN AL CIUDADANO

    public function Contacto()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $ProteccionDatos = PruebasController::ProteccionDatos();
        return view('pruebas.atencionCiudadano.contacto', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ProteccionDatos' => $ProteccionDatos]);
    }

    public function NotificacionAviso()
    {
        $ListarNotificaciones = GYPBogota::ListarNotificaciones();
        $Notificaciones = array();
        $cont           = 0;
        foreach ($ListarNotificaciones as $value) {
            $Notificaciones[$cont]['NOMBRE'] = $value->NOMBRE_CIUDADANO;
            $Notificaciones[$cont]['PLACA'] = $value->PLACA;
            $Notificaciones[$cont]['YEAR'] = $value->YEAR_NOTIFICATION;
            $cont++;
        }
        $ListarDesfijacionActiva = GYPBogota::ListarDesfijacionActiva();
        $Desfijacion = array();
        $contD          = 0;
        // $BotonDesfijacion = 0;
        // if ($ListarDesfijacionActiva) {
        //     $BotonDesfijacion = 1;
        //     foreach ($ListarDesfijacionActiva as $value) {
        //         $Desfijacion[$contD]['CONTENIDO'] = $value->CONTENIDO;
        //         $contD++;
        //     }
        // }
        $BotonDesfijacion = null;
        $texto = null;
        if ($ListarDesfijacionActiva) {
            foreach ($ListarDesfijacionActiva as $value) {
                $texto = $value->CONTENIDO;
            }
            $BotonDesfijacion = '<a href="#" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#modal-desfijacion">Aviso Desfijación</a>
            <div class="modal fade bd-example-modal-xl" id="modal-desfijacion" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title modal-title-primary">CONSTANCIA DESFIJACIÓN
                        <br>NOTIFICACIÓN POR AVISO</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            ' . $texto . '
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>';
        }
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        return view('pruebas.atencionCiudadano.notificacionAviso', ['Notificaciones' => $Notificaciones, 'Desfijacion' => $Desfijacion, 'BotonDesfijacion' => $BotonDesfijacion, 'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    public function PreguntasFrecuentes()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $yearNow = date('Y');
        return view('pruebas.atencionCiudadano.preguntasFrecuentes',['Organigrama' => $Organigrama, 'PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    // SERVICIOS

    public function Beneficios()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImagenesBeneficios = GYPBogota::ImagesBeneficios();
        return view('pruebas.servicios.beneficios', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImagenesBeneficios' => $ImagenesBeneficios]);
    }

    public function CustodiaSegura()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImagenesCustodia = GYPBogota::ImagesCustodia();
        return view('pruebas.servicios.custodiaSegura', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImagenesCustodia' => $ImagenesCustodia]);
    }

    public function Gruas()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ExtraPesado = GYPBogota::GruaExtraPesado();
        $Pesado = GYPBogota::GruaPesado();
        $Planchon = GYPBogota::GruaPlanchon();
        $PlanchonMoto = GYPBogota::GruaPlanchonMoto();
        $IzajeLateral = GYPBogota::GruaIzajeLateral();
        return view('pruebas.servicios.gruas', [
            'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ExtraPesado' => $ExtraPesado, 'Pesado' => $Pesado,
            'Planchon' => $Planchon, 'PlanchonMoto' => $PlanchonMoto, 'IzajeLateral' => $IzajeLateral
        ]);
    }

    public function NuestrosServicios()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImgNuestrosServicios = GYPBogota::ImgNuestrosServicios();
        return view('pruebas.servicios.nuestrosServicios', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama,'ImgNuestrosServicios' => $ImgNuestrosServicios]);
    }

    public function ProcesoInmovilizacion()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImgProcesoInmovilizacion = GYPBogota::ImgProcesoInmovilizacion();
        return view('pruebas.servicios.procesoInmovilizacion', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgProcesoInmovilizacion' => $ImgProcesoInmovilizacion]);
    }

    public function ProcesoRetiro()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImgProcesoRetiro = GYPBogota::ImgProcesoRetiro();
        return view('pruebas.servicios.procesoRetiro', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgProcesoRetiro' => $ImgProcesoRetiro]);
    }

    public function Tarifas()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImgTarifas = GYPBogota::ImgTarifas();
        return view('pruebas.servicios.tarifas', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgTarifas' => $ImgTarifas]);
    }

    public function MonitoreoCamara()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImgMonitoreo = GYPBogota::ImgMonitoreo();
        return view('pruebas.servicios.monitoreoCamaras', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgMonitoreo' => $ImgMonitoreo]);
    }

    public function MensajeSms()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQSer();
        $Organigrama = PruebasController::OrganigramaSer();
        $ImgMensajes = GYPBogota::ImgMensajes();
        return view('pruebas.servicios.mensajeSms', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgMensajes' => $ImgMensajes]);
    }

    // TRAMITES

    public function ConsultaLiquidacion()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        return view('pruebas.tramites.consultaLiquidacion', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    public function PagoLinea()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        $ImgPagoLinea = GYPBogota::ImgPagoLinea();
        return view('pruebas.tramites.pagoLinea', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgPagoLinea' => $ImgPagoLinea]);
    }

    public function PuntosAtencion()
    {
        $PoliticaHSEQ = PruebasController::PoliticaHSEQ();
        $Organigrama = PruebasController::Organigrama();
        return view('pruebas.tramites.puntosAtencion', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    public function CrearVisita(Request $request)
    {
        $Ip_client = $_SERVER['REMOTE_ADDR'];
        $pagina = $request->pagina;
        GYPBogota::CrearVisita($Ip_client, $pagina);
    }

    public function Contactenos(Request $request)
    {

        date_default_timezone_set('America/Bogota');

        $validator = Validator::make($request->all(), [
            'nombres'           =>  'required',
            'apellidos'         =>  'required',
            'correo'            =>  'required|email',
            'mensaje'           =>  'required',
            'check-contacto'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('contacto')->withErrors($validator)->withInput();
        } else {

            $Nombres = $request->nombres;
            $Apellidos = $request->apellidos;
            $NombreUsuario = $Nombres . ' ' . $Apellidos;
            $Correo = $request->correo;
            $Mensaje = $request->mensaje;

            $CorreoDestino  = "denuncias@gypbogota.com";
            $subject    = "Mensaje de $NombreUsuario";
            Mail::send(
                'Emails.CorreoContacto',
                ['NombreUsuario' => $NombreUsuario, 'Email' => $Correo, 'Mensaje' => $Mensaje],
                function ($msj) use ($subject, $Correo, $NombreUsuario, $CorreoDestino) {
                    $msj->from($CorreoDestino, "Gruas y Parqueaderos Bogotá S.A.S");
                    $msj->subject($subject);
                    $msj->addCC($Correo);
                    $msj->to($CorreoDestino);
                }
            );

            if (count(Mail::failures()) === 0) {
                $Contacto  = GYPBogota::Contactenos($NombreUsuario, $Correo, $Mensaje);
                if ($Contacto) {
                    $verrors = $NombreUsuario . ' su mensaje fue enviado con éxito';
                    return Redirect::to('contacto')->with('mensaje', $verrors);
                } else {
                    $verrors = 'Hubo un error al enviar su mensaje';
                    return Redirect::to('contacto')->with('precaucion', $verrors);
                }
            } else {
                $verrors = 'Hubo un error al enviar su mensaje';
                return Redirect::to('contacto')->with('precaucion', $verrors);
            }
        }
    }

    public function TrabajoNosotros(Request $request)
    {
        date_default_timezone_set('America/Bogota');

        $validator = Validator::make($request->all(), [
            'nombres'               =>  'required',
            'apellidos'             =>  'required',
            'tipo_documento'        =>  'required',
            'documentoIdentidad'    =>  'required',
            'direccion'             =>  'required',
            'telefono'              =>  'required',
            'profesion'             =>  'required',
            'correo'                =>  'required|email',
            'check-trabajo'        =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('trabajo')->withErrors($validator)->withInput();
        } else {

            $Nombres = $request->nombres;
            $Apellidos = $request->apellidos;
            $NombreUsuario = $Nombres . ' ' . $Apellidos;
            $Correo = $request->correo;
            $TipoDocumento = $request->tipo_documento;
            $NombreTipoDocumento = GYPBogota::TipoDocumentoId($TipoDocumento);
            foreach ($NombreTipoDocumento as $value) {
                $NombreDocumento = $value->NOMBRE_DOCUMENTO;
            }
            $Documento = $request->documentoIdentidad;
            $Direccion = $request->direccion;
            $Telefono = $request->telefono;
            $Profesion = $request->profesion;
            $HojaVida  = $request->file('hojaVida');
            $destinationPath    = null;
            $filename           = null;
            if ($HojaVida) {
                $file               = $HojaVida;
                $destinationPath    = public_path() . '/documentos/HV';
                $extension          = $file->getClientOriginalExtension();
                $name               = $file->getClientOriginalName();
                $nombrearchivo      = pathinfo($name, PATHINFO_FILENAME);
                $nombrearchivo      = PruebasController::eliminar_tildes($nombrearchivo);
                $nombreUsuario      = PruebasController::eliminar_tildes($NombreUsuario);
                $filename           = 'Hoja_Vida_' . $nombreUsuario . '.' . $extension;
                $uploadSuccess      = $file->move($destinationPath, $filename);
                $archivofoto        = file_get_contents($uploadSuccess);
                $NombreFoto         = $filename;
            }
            $CorreoDestino  = "coordinadorgh@gypbogota.com";
            $subject    = "Hoja de vida de $NombreUsuario";
            Mail::send(
                'Emails.CorreoTrabajo',
                ['NombreUsuario' => $NombreUsuario, 'Email' => $Correo, 'TipoDocumento' => $NombreDocumento, 'Identificacion' => $Documento, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 'Profesion' => $Profesion],
                function ($msj) use ($subject, $Correo, $filename, $NombreUsuario, $CorreoDestino) {
                    $msj->from($CorreoDestino, "Gruas y Parqueaderos Bogotá S.A.S");
                    $msj->subject($subject);
                    $msj->addCC($Correo);
                    $msj->to($CorreoDestino);
                    $msj->attach(public_path('/documentos/HV') . '/' . $filename);
                }
            );

            if (count(Mail::failures()) === 0) {
                unlink(public_path('/documentos/HV') . '/' . $filename);
                $Trabajo  = GYPBogota::Trabajo($NombreUsuario, $Correo, $TipoDocumento, $Documento, $Direccion, $Telefono, $Profesion, $NombreFoto);
                if ($Trabajo) {
                    $verrors = $NombreUsuario . ' su solicitud fue enviada con éxito';
                    return Redirect::to('trabajo')->with('mensaje', $verrors);
                } else {
                    $verrors = 'Hubo un error al enviar su hoja de vida';
                    return Redirect::to('trabajo')->with('precaucion', $verrors);
                }
            } else {
                $verrors = 'Hubo un error al enviar su hoja de vida';
                return Redirect::to('trabajo')->with('precaucion', $verrors);
            }
        }
    }

    public static function eliminar_tildes($nombrearchivo)
    {

        $cadena = $nombrearchivo;
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', 'Ã¡'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'a'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë', 'Ã©'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'e'),
            $cadena
        );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î', 'Ã­'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'i'),
            $cadena
        );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô', 'Ã³'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'o'),
            $cadena
        );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü', 'Ãº'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'u'),
            $cadena
        );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        $cadena = str_replace(
            array(' ', '-'),
            array('_', '_'),
            $cadena
        );

        $cadena = str_replace(
            array("'", '‘', 'a€“'),
            array(' ', ' ', '-'),
            $cadena
        );

        return $cadena;
    }

    public static function PoliticaHSEQ()
    {
        $ListarDocumento = GYPBogota::DocumentoPoliticaHSEQ();
        $ubicacion = null;
        if ($ListarDocumento) {
            foreach ($ListarDocumento as $value) {
                $documento = str_replace('../', '', $value->UBICACION);
            }
            $ubicacion = '<li><a href="' . $documento . '" target="_blank">Política HSEQ</a></li>';
        } else {
            $ubicacion = '<li><a href="#">Política HSEQ</a></li>';
        }
        return $ubicacion;
    }

    public static function PoliticaHSEQSer()
    {
        $ListarDocumento = GYPBogota::DocumentoPoliticaHSEQ();
        $ubicacion = null;
        if ($ListarDocumento) {
            foreach ($ListarDocumento as $value) {
                $documento = $value->UBICACION;
            }
            $ubicacion = '<li><a href="' . $documento . '" target="_blank">Política HSEQ</a></li>';
        } else {
            $ubicacion = '<li><a href="#">Política HSEQ</a></li>';
        }
        return $ubicacion;
    }

    public static function ProteccionDatos()
    {
        $ListarDocumento = GYPBogota::DocumentoProteccionDatos();
        $ubicacion = null;
        if ($ListarDocumento) {
            foreach ($ListarDocumento as $value) {
                $documento = str_replace('../', '', $value->UBICACION);
            }
            $ubicacion = '<a href="' . $documento . '" style="color: #000000 !important;font-weight: 600;" target="_blank">aquí</a>.';
        } else {
            $ubicacion = '<a href="#" style="color: #000000 !important;font-weight: 600;">aquí</a>.';
        }
        return $ubicacion;
    }

    public static function Organigrama()
    {
        $ListarOrganigrama = GYPBogota::ImagenOrganigrama();
        $Organigrama = null;
        if ($ListarOrganigrama) {
            foreach ($ListarOrganigrama as $value) {
                $imagen = str_replace('../', '', $value->UBICACION);
            }
            $Organigrama = '<a href="' . $imagen . '" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>.';
        } else {
            $Organigrama = '<a href="#" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>.';
        }
        return $Organigrama;
    }

    public static function OrganigramaMS()
    {
        $ListarOrganigrama = GYPBogota::ImagenOrganigrama();
        $Organigrama = null;
        if ($ListarOrganigrama) {
            foreach ($ListarOrganigrama as $value) {
                $imagen = str_replace('../', '', $value->UBICACION);
            }
            $Organigrama = '<a href="' . $imagen . '" target="_blank" title="Organigrama" id="linkMapaSitio">Organigrama</a>';
        } else {
            $Organigrama = '<a href="#" target="_blank" title="Organigrama" id="linkMapaSitio">Organigrama</a>';
        }
        return $Organigrama;
    }


    public static function OrganigramaSer()
    {
        $ListarOrganigrama = GYPBogota::ImagenOrganigrama();
        $Organigrama = null;
        if ($ListarOrganigrama) {
            foreach ($ListarOrganigrama as $value) {
                $imagen = $value->UBICACION;
            }
            $Organigrama = '<a href="' . $imagen . '" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>.';
        } else {
            $Organigrama = '<a href="#" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>.';
        }
        return $Organigrama;
    }
}
