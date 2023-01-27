<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="row">
    <div class="col-md-8 mx-auto">
        <table class="table table-bordered">
            <thead style="background-color: #c4bfbf; color: #0a0a0a">
            <tr>
                <th scope="col"  style="font-weight: bold">NIP</th>
                <th scope="col"  style="font-weight: bold">NUPTK</th>
                <th scope="col"  style="font-weight: bold">Nama</th>
                <th scope="col"  style="font-weight: bold">Email</th>
                <th scope="col"  style="font-weight: bold">No. Telepon</th>
            </tr>
            </thead>
            <tbody>
            @foreach($guru as $gr)
                <tr>
                    <td>{{ $gr->nip }}</td>
                    <td>{{ $gr->nuptk }}</td>
                    <td>{{ $gr->nama }}</td>
                    <td>{{ $gr->email }}</td>
                    <td>{{ $gr->telepon }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
