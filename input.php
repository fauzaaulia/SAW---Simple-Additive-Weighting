<?php include('header.php'); ?>

<form action="hasil.php" method="POST">
  <input type="hidden" name="c" value="<?php echo $_POST['c']; ?>">
  <input type="hidden" name="a" value="<?php echo $_POST['a']; ?>">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Input Nilai Kriteria</h5>
                    <div class="card-body table-responsive">
                        <table class="table table-borderless">
                        <?php for($i=1;$i<=$_POST['c'];$i++) { ?>
                          <tr>
                            <td>C<?php echo $i ?></td>
                            <td><input class="form-control" type="text" name="<?php echo 'c'.$i ?>"></td>
                            <td><input class="form-check-input" type="radio" name="<?php echo 'atb'.$i ?>" value="k">
                              <label for="keuntungan">Benefit</label>
                            </td>
                            <td><input type="radio" name="<?php echo 'atb'.$i ?>" value="b">
                                <label for="biaya">Cost</label>
                            </td>
                          </tr>
                        <?php } ?>	
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Input Nilai Alternatif</h5>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                              <tr>
                                  <th rowspan="<?php echo $_POST['a']; ?>">Alternatif</th>
                                  <th colspan="<?php echo $_POST['c']; ?>">Kriteria<br></th>
                              </tr>
                              <tr>
                                <?php for($i=1;$i<=$_POST['c'];$i++) { ?>		
                                  <td>C<?php echo $i; ?></td>
                                <?php } ?>
                              </tr>
                            </thead>
                            <tbody>
                              <?php for($j=1;$j<=$_POST['a'];$j++) { ?>
                              <tr>
                                <td>A<?php echo $j; ?></td>
                                <?php for($i=1;$i<=$_POST['c'];$i++) { ?>
                                <td><input class="form-control" type="text" name="<?php echo 'a'.$j.$i ?>"></td>
                                <?php } ?>
                              </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Cek Hasil</button>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>