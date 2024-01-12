{{-- MCU --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medical Checkup Report</title>
    <style>
        /* @page {
            size: landscape;
        } */

        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;

        }

        .logo-perusahaan {
            max-width: 100px;
            margin-right: 20px;
        }

        .info-perusahaan {
            flex-grow: 1;
        }

        h3 {
            text-align: center;
            color: #000000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-collapse: collapse;

        }

        th,
        td {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
            font-size: 12px;
        }

        th {
            background-color: #ffffff;
        }

        .kop-surat p {
            margin: 1, 5;
            text-align: center;
        }

        .table {
            border: none
        }

        .compact-table th,
        .compact-table td {
            padding: 6px;
           
            font-size: 12px;
            
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        {{-- <img src="assets/img/bridgestone_outline.png " alt="Logo Perusahaan" class="logo-perusahaan"> --}}
        <div class="info-perusahaan">
            @foreach ($medicalcheckup as $mcu)
                <p>PT Bridgestone Kalimantan Plantation</p>
                <p>Resume Hasil Medical Check Up</p>

                <table>
                    {{-- <tr>
                        <td style="border: none;" width="5cm">
                            ID
                        </td>
                        <td style="border: none">: {{ $mcu->user->id }}</td>
                    </tr> --}}
                    <tr>
                        <td style="border: none;" width="5cm">NIK</td>
                        <td style="border: none">: {{ $mcu->user->nik }}</td>
                    </tr>
                    <tr>
                        <td style="border: none;" width="5cm">Nama</td>
                        <td style="border: none">: {{ $mcu->user->name }}</td>
                    </tr>
                    <tr>
                        <td style="border: none;" width="5cm">Status</td>
                        <td style="border: none">: {{ $mcu->user->status }}</td>
                    </tr>
                    <tr>
                        <td style="border: none;" width="5cm"> Departemen</td>
                        <td style="border: none">: {{ $mcu->user->dept }}</td>
                    </tr>
                    <tr>
                        <td style="border: none;" width="5cm"> Tanggal Checkup</td>
                        <td style="border: none">: {{ $mcu->tanggal_pemeriksaan }}</td>
                    </tr>

                </table>

        </div>
    </div>
    {{-- <h3>Hasil Medical Checkup </h3> --}}
    <table class="compact-table">
        {{-- <table width="100%" style="font-size: 10pt"> --}}
        <thead>
            <tr>
                <th>NO</th>
                <th>Pemeriksaan</th>
                <th>Hasil</th>
            </tr>
            <tr>
                <th colspan="3">Pemeriksaan Umum</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td style="width: 5%">1</td>
                <td style="width: 65%">Berat Badan</td>
                <td style="width: 30%">{{ $mcu->berat_badan }}</td>
            </tr>
            <tr>
                <td style="width: 5%">2</td>
                <td style="width: 65%">Tinggi Badan</td>
                <td style="width: 30%">{{ $mcu->tinggi_badan }}</td>
            </tr>
            <tr>
                <td style="width: 5%">3</td>
                <td style="width: 65%">Postur Anggota Gerak</td>
                <td style="width: 30%">{{ $mcu->anggota_gerak }}</td>
            </tr>
            <tr>
                <td style="width: 5%">4</td>
                <td style="width: 65%">Tekanan Darah</td>
                <td style="width: 30%">{{ $mcu->tekanan_darah }}</td>
            </tr>
            <tr>
                <td style="width: 5%">5</td>
                <td style="width: 65%">Nadi</td>
                <td style="width: 30%">{{ $mcu->nadi }}</td>
            </tr>
            <tr>
                <td style="width: 5%">6</td>
                <td style="width: 65%">Telinga</td>
                <td style="width: 30%">{{ $mcu->telinga }}</td>
            </tr>
            <tr>
                <td style="width: 5%">7</td>
                <td style="width: 65%">Hidung</td>
                <td style="width: 30%">{{ $mcu->hidung }}</td>
            </tr>
            <tr>
                <td style="width: 5%">8</td>
                <td style="width: 65%">Tenggorokan</td>
                <td style="width: 30%">{{ $mcu->tenggorokan }}</td>
            </tr>
            <tr>
                <td style="width: 5%">9</td>
                <td style="width: 65%">Mata</td>
                <td style="width: 30%">{{ $mcu->mata }}</td>
            </tr>
            <tr>
                <td style="width: 5%">10</td>
                <td style="width: 65%">IMT</td>
                <td style="width: 30%">{{ $mcu->imt }}</td>
            </tr>
            <tr>
                <td style="width: 5%">11</td>
                <td style="width: 65%">Fungsi Cardiovaskuler</td>
                <td style="width: 30%">{{ $mcu->cardiovaskuler }}</td>
            </tr>
            <tr>
                <td style="width: 5%">12</td>
                <td style="width: 65%">Fungsi Pernafasan</td>
                <td style="width: 30%">{{ $mcu->pernafasan }}</td>
            </tr>
            <tr>
                <td style="width: 5%">13</td>
                <td style="width: 65%">Abdomen</td>
                <td style="width: 30%">{{ $mcu->abdomen }}</td>
            </tr>
            {{-- <tr>
                <td style="width: 5%">14</td>
                <td style="width: 65%">Urine</td>
                <td style="width: 30%">{{ $mcu->urine }}</td>
            </tr>
            <tr>
                <td style="width: 5%">15</td>
                <td style="width: 65%">Hematologi</td>
                <td style="width: 30%">{{ $mcu->hematologi }}</td>
            </tr> --}}
            <tr>
                <td style="width: 5%">14</td>
                <td style="width: 65%">Audiometri</td>
                <td style="width: 30%">{{ $mcu->audiometri }}</td>
            </tr>
            <tr>
                <td style="width: 5%">15</td>
                <td style="width: 65%">Spirometri</td>
                <td style="width: 30%">{{ $mcu->spirometri }}</td>
            </tr>
            <tr>
                <td style="width: 5%">16</td>
                <td style="width: 65%">Riwayat Penyakit</td>
                <td style="width: 30%">{{ $mcu->riwayat_penyakit }}</td>
            </tr>

           
            @endforeach
        </tbody>
    </table><br>
    <table>
        <tr>
            <td style="border: none;" width="5cm">Diagnosa </td>
            <td style="border: none">: {{ $mcu->diagnosa }}</td>
        </tr>
        <tr>
            <td style="border: none;" width="5cm">Saran</td>
            <td style="border: none">: {{ $mcu->saran }}</td>
        </tr>
        <tr>
            <td style="border: none;" width="5cm">Hasil Akhir</td>
            <td style="border: none">: {{ $mcu->hasil_akhir }}</td>
        </tr>

    </table>

</body>

</html>
