<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bbm</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Bbm</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode bbm</th>
                                    <th>Nama bbm</th>
                                    <th>Harga jual</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bbms as $bbm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bbm->kd_bbm }}</td>
                                        <td>{{ $bbm->nm_bbm }}</td>
                                        <td>{{ $bbm->hrg_jual }}</td>
                                        <td>
                                            <a href="{{ route('bbm.edit', $bbm->kd_bbm) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('bbm.destroy', $bbm->kd_bbm) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>