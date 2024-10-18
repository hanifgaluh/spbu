<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>TAMBAH BBM</h2>
    <form action="{{ route('bbm.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="kd_bbm">Kode bbm</label>
            <input type="text" id="kd_bbm" name="kd_bbm">
        </div>
        <div class="form-group">
            <label for="nm_bbm">Nama bbm</label>
            <input type="text" id="nm_bbm" name="nm_bbm">
        </div>
        <div class="form-group">
            <label for="hrg_jual">Harga jual</label>
            <input type="text" id="hrg_jual" name="hrg_jual">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</body>
</html>