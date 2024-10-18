<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit bbm</title>
</head>

<body>

    <div class="container">
        <h1>Edit bbm</h1>
        <form action="{{ route('bbm.update', $bbm->kd_bbm) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nm_bbm">Nama BBM</label>
                <input  id="nm_bbm" name="nm_bbm" value="{{ $bbm->nm_bbm }}" required>
            </div>

            <div class="form-group">
                <label for="hrg_jual">Harga Jual</label>
                <input id="hrg_jual" name="hrg_jual" value="{{ $bbm->hrg_jual }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>


    </div>



</body>

</html>