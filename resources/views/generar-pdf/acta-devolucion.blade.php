<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Acta de devolución</title>
    <style type="text/css">
        .logo {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;

        }

        th,
        td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }

        .subtitulo {
            padding-left: 15px;
            color: #00376f;
            font-size: 0.8rem;
        }
    </style>
</head>

<body style="color: black;font-size:1rem;">
    <table style="width: 100%">
        <tr>
            <td
                style="width: 10%; border-radius: 30px; border-left: black 1px; border-top: black 1px;  border-bottom: black 1px; padding-left: 20px">
                <img src="{{ asset('/assets/img/metrogas/logo.png') }}" class="logo" style="margin-right: 20px">
            </td>
            <td
                style=" border: black 1px; text-align: center; padding-left: 20px; padding-right: 10px; font-size: 1rem">
                <b>ACTA DE DEVOLUCIÓN N° {{ $object->id }}</b>
            </td>
            <td
                style="border: 1px solid black; width: 150px;  text-align: right; padding-left: 20px; padding-right: 10px; font-size: 1rem">
                Código: F-GAD-08 <br>
                Versión: 01 <br>
                Página
            </td>
        </tr>
    </table>


    <p>Yo, <b>{{ mb_strtoupper($object->quienEntrega->name) }}</b> declaro haber recibido los Activos, lo cual me
        comprometo a cuidarlos
    </p>
    <table style="width: 100%;">
        <tr>
            <td style="padding-left: 15px">
                <b>AREA:</b>
            </td>
            <td>
                {{ $object->area }}
            </td>
            <td>
                <b>CENTRO OPERATIVO:</b>
            </td>
            <td>
                {{ $object->centro_operativo }}
            </td>
        </tr>
        <tr>
            <td style="padding-left: 15px">
                <b>UBICACIÓN:</b>
            </td>
            <td>
                {{ $object->ubicacion }}
            </td>
            <td>
                <b>FECHA:</b>
            </td>
            <td>
                {{ $object->fecha_entrega }}
            </td>
        </tr>
    </table>
    <p>y utilizarlos correctamente de acuerdo con las actividades que me sean asignadas, también a devolverlos cuando
        tenga que dejar el servicio por algún motivo o por el desgaste de uso, y con mi firma me responsabilizo por la
        pérdida de los mismos bajo mi cargo.</p>

    <table style="width: 100%">
        <tr>
            <td style="text-align: center">
                <b>ACTIVOS</b>
            </td>
        </tr>
        <tr style="">
            <table style="width: 100%; border: 1px solid black; ">
                <thead>
                    <tr>
                        <th>
                            NO. DE ACTIVO
                        </th>
                        <th>
                            DESCRIPCIÓN
                        </th>
                        <th>
                            MARCA/MODELO
                        </th>
                        <th>
                            SERIAL
                        </th>
                        <th>
                            CARACTERISTICAS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($object->detalle as $item)
                        <tr>
                            <td>
                                {{ $item->codigo_interno }}
                            </td>
                            <td>
                                {{ $item->nombre }}
                            </td>
                            <td>
                                {{ $item->marca->nombre }}
                            </td>
                            <td>
                                {{ $item->serial }}
                            </td>
                            <td>
                                @foreach ($item->caracteristicas as $car)
                                    {{ $car->nombre . ' ' . $car->valor }}<br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </tr>
    </table>



    <p><b>Nota:</b> Aplica para materiales instalados en Activos (Estaciones de regulación/City Gate/Descompresora y2
        Compresora</p>

    <table style="width: 100%;">
        <tr>
            <td>
                <b>Quien Entrega:</b>
            </td>

            <td>
                <b>Quien Recibe:</b>
            </td>
        </tr>
        <tr>
            <td>
                {{ $object->quienEntrega->name }}<br>
                {{ $object->quienEntrega->jobtitle_ldap }}
            </td>
            <td>
                {{ $object->createdBy->name }}<br>
                {{ $object->createdBy->jobtitle_ldap }}
            </td>
        </tr>
    </table>


    <h3 style="font-size: 0.8rem">OBSERVACIONES</h3>
    <ol style="font-size: 0.7rem; text-align: justify;">
        <li>En caso de daño físico o lógico de alguno de los elementos entregados, donde se compruebe su responsabilidad
            por negligencia en el uso, responderé por
            el valor de la reparación o en caso de no tener arreglo asumiré el costo total comercial del equipo nuevo.
        </li>
        <li>En caso de pérdida o hurto me comprometo a realizar el correspondiente denuncio ante la autoridad competente
            e informar oportunamente a METROGAS
            DE COLOMBIA S.A. E.S.P. adjuntando el soporte correspondiente emitido por la autoridad. Cuando exista tal
            hecho sea por negligencia o culpa
            responderé por los elementos dados en custodia o por una suma igual al valor comercial de los elementos, por
            lo cual autorizo para que el valor
            correspondiente se descuente de mi salario o prestaciones económicas a que tenga derecho cuando esto suceda.
        </li>
        <li>Me comprometo a respetar y mantener la confidencialidad de los datos e informaciones que manipule dentro y
            fuera de la compañía, consignados en los
            recursos informáticos entregados, y la obligación de devolver la información a la que se ha tenido acceso en
            el momento que termine la relación
            contractual. La sustracción o revelación de dicha información puede ser constitutivo de un ilícito de
            naturaleza penal.</li>
        <li>A la terminación de contrato, vacaciones, incapacidades, etc., el computador y los demás activos que fueron
            entregados deberán ser reintegrados en
            buenas condiciones, solo con el deterioro normal por su funcionamiento u operación, de lo contrario asumiré
            el costo por reparación o reposición.</li>
    </ol>

</body>

</html>
