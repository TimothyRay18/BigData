<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Ubah Daftar Belanja</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <style>
            body{
                margin:1%;
            }
        </style>
    </head>
    <body>
    <h1>New List</h1>
    <form name="UbahDaftarBelanja" method="post" action="/shopping/{{$daftarbelanja->id}}">
        @method('patch')
        @csrf
        <div class="input-group input-group-sm mb-3" style="width:25%">
            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal</span>
            <input type="date" name="dateFrom" value="{{$daftarbelanja->tanggal}}" />
        </div>
        <div class="input-group input-group-sm mb-3" style="width:25%">
            <span class="input-group-text" id="inputGroup-sizing-sm">Judul</span>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{$daftarbelanja->judul}}">
            @error('judul')
                <div class="invalid-feedback">
                    Isi judul
                </div>
            @enderror
        </div>
        <div class="mb-3">
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
            <?php $row=1?>
            <tbody id="table">
                @foreach($daftarbelanjadetil as $detil)
                    <tr>
                    <td>{{$detil->nourut}}<input type="hidden" name="id[]" value="{{$detil->nourut}}"></td>
                    <td><input type="text" class= "form-control" name="nama[]" value="{{$detil->namabarang}}"></td>
                    <td><input type="number" class= "form-control" name="banyak[]" value="{{$detil->jml}}"></td>
                    <td><input type="text" class= "form-control" name="satuan[]" value="{{$detil->satuan}}"></td>
                    <td><input type="text" class= "form-control" name="memo[]" value="{{$detil->memo}}"></td>
                    </tr>
                @endforeach
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