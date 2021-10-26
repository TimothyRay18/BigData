<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Shopping List</title>
        <style>
            nav {
            float: left;
            width: 30%;
            height: 90vh;
            background: #ccc;
            padding: 20px;
            margin:1%;
            }

            article {
            float: left;
            padding: 20px;
            width: 68%;
            }

            section::after {
            content: "";
            display: table;
            clear: both;
            }
        </style>
    </head>
    <body>
        <div class="mt-2"></div>
            <div class="container-fluid" class="">
                <a class="btn btn-primary" href="{{url('/shopping/create')}}" role="button">Baru</a>
                <a class="btn btn-primary" href="{{url('/shopping')}}" role="button">Muat Ulang</a>
                <?php 
                    $char = substr(url()->current(),31);
                    $found = true;
                    $i=0;
                    while($found && $i<count($daftarbelanja)){
                        if($daftarbelanja[$i]->id==$char){
                            $found=false;
                        }
                        $i++;
                    }
                    if($found==false){
                        echo "<h1>".$daftarbelanja[($i-1)]->judul."</h1>";
                        ?>
                            <form action="{{$daftarbelanja[($i-1)]->id}}" class="d-inline" method="post">
                            @method('delete')
                            @csrf
                        <?php
                        echo "<button type='submit' class='btn btn-danger'>Hapus</button></form> &nbsp;";
                        echo "<a href=\"{$daftarbelanja[($i-1)]->id}/edit\" class=\"btn btn-success\">Ubah</a>";
                    }
                ?>
                @if(session('status'))
                    <div class="alert alert-success mt-2">
                        {{session('status')}}
                    </div>
                @endif
            </div>
        </div>
        <section>
            <nav>
                @foreach($daftarbelanja as $daftar)
                    <a class="list-group-item list-group-item-action" href="{{url('/shopping/'.$daftar->id)}}">{{$daftar->judul}}</a>
                @endforeach
            </nav>
            <article>
                <table class="table">
                    <thead class="table-dark">
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Banyak</th>
                        <th>Satuan</th>
                        <th>Memo</th>
                    </thead>
                    <tbody>
                        @if($char=='')
                            @foreach($daftarbelanjadetil as $detil)
                            <tr>
                                <th scope="row">{{$detil->id}}</th>
                                <td>{{$detil->namabarang}}</td>
                                <td>{{$detil->jml}}</td>
                                <td>{{$detil->satuan}}</td>
                                <td>{{$detil->memo}}</td>
                            </tr>
                            @endforeach
                        @else
                            @foreach($daftarbelanjadetil as $detil)
                            <tr>
                                <th scope="row">{{$detil->nourut}}</th>
                                <td>{{$detil->namabarang}}</td>
                                <td>{{$detil->jml}}</td>
                                <td>{{$detil->satuan}}</td>
                                <td>{{$detil->memo}}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </article>
        </section>

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