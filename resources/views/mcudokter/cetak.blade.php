{{-- Laboratorium --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Hasil Laboratorium</title>
    <style>
        @page {
            size: A5 landscape;
            margin: 1cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 9pt;
        }

        .kop p {
            margin: 1, 5;
            text-align: center;

        }
    </style>
</head>



<body>
    @foreach ($laboratorium as $lab)
        {{-- <p style="text-center"><strong> Hasil Laboratorium </strong></p> --}}
        <table width="50%">
            <tr>
                <td>
                    ID. : {{ $lab->user->id }}
                </td>
                <td>
                    Tanggal : {{ $lab->tanggal }}
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    Nama : {{ $lab->user->name }}
                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td><b>HEMATOLOGI</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>hemoglobin </td>
                            <td>:</td>
                            <td> {{ $lab->hemoglobin }}</td>
                            <td>(n = L: 13,0-17,5)</td>
                        </tr>
                        <tr>
                            <td>eritrosit </td>
                            <td>:</td>
                            <td> {{ $lab->eritrosit }}</td>
                            <td>(n = 4,5-6,0)</td>
                        </tr>
                        <tr>
                            <td>luekosit </td>
                            <td>:</td>
                            <td> {{ $lab->luekosit }}</td>
                            <td>(n = 4700-10500)</td>
                        </tr>
                        <tr>
                            <td>hematokrit </td>
                            <td>:</td>
                            <td> {{ $lab->hematokrit }}</td>
                            <td>(n = L: 40-50)</td>
                        </tr>
                        <tr>
                            <td>trombosit </td>
                            <td>:</td>
                            <td> {{ $lab->trombosit }}</td>
                            <td>(n = 150-350 ribu)</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>

                        </tr>
                        <tr>
                            <td><b>KIMIA KLINIK</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>glukosa-sewaktu</td>
                            <td>:</td>
                            <td> {{ $lab->glukosa_sewaktu }}</td>
                            <td>(n < 115)</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><u> <b>URINALISIS MAKROSKOPIS</b> </u></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>warna</td>
                            <td>:</td>
                            <td colspan="2">{{ $lab->warna }}</td>
                        </tr>
                        <tr>
                            <td>kejernihan</td>
                            <td>:</td>
                            <td colspan="2">{{ $lab->kejernihan }}</td>
                        </tr>
                    </table>
                </td>
                <td rowspan="2" style="padding-left: 120px">
                    <table>
                        <tr>
                            <td><b>KIMIA URIN</b> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>B.J.</td>
                            <td>:</td>
                            <td>{{ $lab->bj }} (n =1,003-1,030)</td>
                        </tr>
                        <tr>
                            <td>pH</td>
                            <td>:</td>
                            <td>{{ $lab->ph }} (n = 5-6)</td>
                        </tr>
                        <tr>
                            <td>leuko</td>
                            <td>:</td>
                            <td>{{ $lab->leuko }} (n = -)</td>
                        </tr>
                        <tr>
                            <td>nitrit</td>
                            <td>:</td>
                            <td>{{ $lab->nitrit }} (n= -)</td>
                        </tr>
                        <tr>
                            <td>protein</td>
                            <td>:</td>
                            <td>{{ $lab->protein }} (n= -)</td>
                        </tr>
                        <tr>
                            <td>glukosa</td>
                            <td>:</td>
                            <td>{{ $lab->glukosa }} (n= -)</td>
                        </tr>
                        <tr>
                            <td>keton</td>
                            <td>:</td>
                            <td>{{ $lab->keton }} (n= -)</td>
                        </tr>
                        <tr>
                            <td>urobil</td>
                            <td>:</td>
                            <td>{{ $lab->urobil }} (n= -)</td>
                        </tr>
                        <tr>
                            <td>bili</td>
                            <td>:</td>
                            <td>{{ $lab->bili }} (n= -)</td>
                        </tr>
                        <tr>
                            <td>blood</td>
                            <td>:</td>
                            <td>{{ $lab->blood }} (n= -)</td>
                        </tr>
                        <tr>
                            <td><b>MIKROSKOPIS</b></td>
                            <td></td>
                            <td></td>
                        <tr>
                            <td>leuko</td>
                            <td>:</td>
                            <td>{{ $lab->m_leuko }} (n = 2-4)</td>
                        </tr>
                        <tr>
                            <td>eri</td>
                            <td>:</td>
                            <td>{{ $lab->eri }} (n = 1-3)</td>
                        </tr>
                        <tr>
                            <td>epitel</td>
                            <td>:</td>
                            <td>{{ $lab->epitel }} (n = +)</td>
                        </tr>
                        <tr>
                            <td>kristal</td>
                            <td>:</td>
                            <td>{{ $lab->kristal }} (n = -)</td>
                        </tr>
                        <tr>
                            <td>bakteri</td>
                            <td>:</td>
                            <td>{{ $lab->bakteri }} (n = -)</td>
                        </tr>
                        <tr>
                            <td>jamur</td>
                            <td>:</td>
                            <td>{{ $lab->jamur }} (n = -)</td>
                        </tr>
                        <tr>
                            <td>silinder</td>
                            <td>:</td>
                            <td>{{ $lab->silinder }} (n = -)</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    Penanggung jawab,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    {{ $lab->nama_dokter }}
                </td>
            </tr>
        </table>
    @endforeach
</body>

</html>
