<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="{{asset("fonts/icomoon/style.css")}}">
<link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
<div class="row">
<div class="col-md-12">
    <br>
    <h2 style="font-family:Verdana;font-size:14px;"><b>Buen día</b></h2>
        <br>
        <p style="font-family:Verdana;font-size:14px;">A continuación se detalla la información enviada desde el formulario Trabaje con Nosotros de la página de Grúas y Parqueaderos Bogotá S.A.S</p>
        <br>
    <br>
    <table style='max-width: 800px; padding: 10px; margin:0 auto; border-collapse: collapse;font-family:Verdana;font-size:14px;' class='tg' cellpadding='5'>
<colgroup>
    <col style='width: 350px'>
    <col style='width: 800px'>
</colgroup>
<tr>
    <th colspan='2'><b>Hoja de vida</b></th>
</tr>
<tr height='20px'></tr>
<tr>
    <td style="text-transform: uppercase;"><b>Nombres Ciudadano(a):</b></td>
    <td>{{$NombreUsuario}}</td>
</tr>

<tr>
    <td style="text-transform: uppercase;"><b>Tipo Identificación:</b></td>
    <td>{{$TipoDocumento}}</td>
</tr>

<tr>
    <td style="text-transform: uppercase;"><b>Documento de Identificación:</b></td>
    <td>{!! $Identificacion !!}</td>
</tr>

<tr>
    <td style="text-transform: uppercase;"><b>Correo Electrónico:</b></td>
    <td>{!! $Email !!}</td>
</tr>

<tr>
    <td style="text-transform: uppercase;"><b>Dirección:</b></td>
    <td>{!! $Direccion !!}</td>
</tr>

<tr>
    <td style="text-transform: uppercase;"><b>Teléfono:</b></td>
    <td>{{ $Telefono }}</td>
</tr>

<tr>
    <td style="text-transform: uppercase;"><b>Profesión:</b></td>
    <td>{{ $Profesion }}</td>
</tr>
</table>
<br>
<br>
<div class="row">
    <div class="col-md-12">
    <p style="font-family:Verdana;font-size:14px;"><b>Gracias por contactarse con nosotros</b></p>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-12">
        <p style="text-align:justify;font-family:Verdana;font-size:14px;">A continuación se evidencia la hoja de vida de la solicitud<p>
    </div>
</div>
<br>
<br>
        <table style='max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;font-family:Verdana;font-size:14px;' class='tg' cellpadding='5'>
            <tbody>
                <tr>
                    <td colspan="2" style="vertical-align:top;width:60px;">
                        <img loading="lazy" src="https://gruasyparqueaderosbogota.com/images/logo-correo.png" usemap="#m_3620493203722104036_SignatureSanitizer_m_-8559001894841881195_SignatureSanitizer_image-map" class="CToWUd">
                    </td>
                </tr>

            </tbody>
        </table>
</div>

</div>
