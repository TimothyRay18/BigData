<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Daftar Belanja Baru</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <style>
            body{
                margin:1%;
            }
        </style>
        <script>
            var rows=0;
            $(document).ready(function () {
                $("#AddRow").click(AddRow);
                $("#RemoveRow").click(RemoveRow);
            });
            function AddRow() {
                rows=rows+1;
                var table = document.getElementById("table");
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = rows+'<input type="hidden" name="id[]" value="'+rows+'">';
                cell2.innerHTML = '<input type="text" class= "form-control" name="nama[]">';
                cell3.innerHTML = '<input type="number" class= "form-control" name="banyak[]">';
                cell4.innerHTML = '<input type="text" class= "form-control" name="satuan[]">';
                cell5.innerHTML = '<input type="text" class= "form-control" name="memo[]">';
            }

            function RemoveRow(){
                if(rows!=0){
                    rows=rows-1;
                }
                document.getElementById("table").deleteRow(-1);
            }
        </script>
    </head>
    <body>
    <h1>New List</h1>
    <form name="InputDaftarBelanja" method="post" action="/shopping">
        @csrf
        <div class="input-group input-group-sm mb-3" style="width:25%">
            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal</span>
            <input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="input-group input-group-sm mb-3" style="width:25%">
            <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            @error('judul')
                <div class="invalid-feedback">
                    Isi judul
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="button" id="AddRow"  class="btn btn-secondary" value="+" />
            <input type="button" id="RemoveRow" class="btn btn-secondary" value="-" />
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href='/shopping' class="btn btn-secondary">Kembali</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Banyak</th>
                <th>Satuan</th>
                <th>Memo</th>
            </thead>
            <tbody id="table">
            </tbody>
        </table>
    </form>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        -->
    </body>
</html>