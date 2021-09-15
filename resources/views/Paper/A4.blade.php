<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Emulating real sheets of paper in web documents (using HTML and CSS)">
    <title>Export Pdf</title>
    <link rel="stylesheet" type="text/css" href="../assets/paper/sheets-of-paper-a4.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            line-height: 2;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 170px;
        }

        .column2 {
            float: left;
            width: 18%;
            padding: 10px;
            height: 170px;
        }

        .column3 {
            float: left;
            width: 25%;
            padding: 10px;
            height: 170px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body class="document">
    <div class="page" contenteditable="true">
        <center>
            <h1>Surat Denda</h1>
        </center>
        <hr style="margin-top: -15px; margin-bottom: 50px; height: 5px; background-color: black;">
        <p>Pada hari ini, 12 September 2021 lembaga adat kecamatan <b>Nokilalaki</b> menerangkan bahwa saudara:</p>
        <div class="row" style="margin-top: -20px;">
            <div class="column2">
                <p>Nik</p>
                <p>Nama</p>
                <p>TTL</p>
                <p>Jenis Kelamin</p>
            </div>
            <div class="column3">
                <p>: {{$data['pelanggar']->nik}}</p>
                <p>: {{$data['pelanggar']->nama}}</p>
                <p>: {{$data['pelanggar']->tempat_lahir}}, {{$data['pelanggar']->tgl_lahir}}</p>
                <p>: {{$data['pelanggar']->gender}}</p>
            </div>
        </div>
        <p style="margin-top: 50px; text-align: justify;">Telah melakukan pelanggaran aturan tentang
            <b>{{$data['pelanggar']->adat_rerol->hukum_rerol->jenis_pelanggaran}}</b>,
            maka sesuai dengan
            aturan lembaga adat saudara dikenakan denda berupa <b>{{$data['denda']->denda}}</b> dengan perjanjian<b>
                {{$data['pelanggar']->adat_rerol->isi_perjanjian}}</b></p>
        <p>Demikian surat ini dibuat untuk digunakan seperlunya.</p>
        <div class="row" style="text-align: right;">
            <p style="margin-right: 20px; margin-bottom: -30px; margin-top: 100px;">Sigi {{$data['date']}}</p>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="column" style="text-align: center;">
                <p style="margin-right: 50px;">Pihak Pelanggar</p>
                <p style="margin-top: 80px; margin-right: 50px;">{{$data['pelanggar']->nama}}</p>
            </div>
            <div class="column" style="text-align: center;">
                <p style="margin-left: 50px;">Ketua Lembaga</p>
                <p style="margin-top: 80px; margin-left: 50px;">..................</p>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    </script>
</body>

</html>