<?php include('header.php'); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="alert alert-primary" role="alert">
        Masukkan Jumlah Keriteria dan Jumlah Alternatif!
        </div>
            <form action="input.php" method="POST">
                <div class="form-group row">
                    <label for="jml_kriteria" class="col-sm-4 col-form-label">Jumlah Kriteria</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="c" id="jml_kriteria"
                            placeholder="misal: 4">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jml_alternatif" class="col-sm-4 col-form-label">Jumlah Alternatif</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="a" id="jml_alternatif"
                            placeholder="misal: 6">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <div class="col-sm-4">

                    </div> -->
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">Lanjut</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>