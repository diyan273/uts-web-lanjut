<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD AJAX Mahasiswa</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>

        body{
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }

        .container{
            width: 80%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        h2{
            text-align: center;
            color: #333;
        }

        .form-group{
            margin-bottom: 15px;
        }

        input{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button{
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover{
            background: #0056b3;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th{
            background: #007bff;
            color: white;
            padding: 12px;
        }

        table td{
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover{
            background: #f1f1f1;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>CRUD AJAX Data Mahasiswa</h2>

    <div class="form-group">
        <input type="text" id="nama" placeholder="Masukkan Nama">
    </div>

    <div class="form-group">
        <input type="text" id="prodi" placeholder="Masukkan Prodi">
    </div>

    <button id="btnSimpan">Simpan Data</button>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Prodi</th>
            </tr>
        </thead>

        <tbody id="tbody">

        </tbody>

    </table>

</div>

<script>

$(document).ready(function(){

    loadData();

    function loadData(){

        $.ajax({

            url: "http://localhost/ci4/public/mahasiswa/getData",

            method: "GET",

            dataType: "json",

            success: function(response){

                let html = "";

                response.forEach(function(row){

                    html += "<tr>";
                    html += "<td>" + row.id + "</td>";
                    html += "<td>" + row.nama + "</td>";
                    html += "<td>" + row.prodi + "</td>";
                    html += "</tr>";

                });

                $("#tbody").html(html);

            }

        });

    }

    $("#btnSimpan").click(function(){

        let nama = $("#nama").val();
        let prodi = $("#prodi").val();

        $.ajax({

            url: "http://localhost/ci4/public/mahasiswa/simpan",

            method: "POST",

            data: {
                nama: nama,
                prodi: prodi
            },

            success: function(response){

                alert("Data berhasil disimpan");

                $("#nama").val('');
                $("#prodi").val('');

                loadData();

            }

        });

    });

});

</script>

</body>
</html>