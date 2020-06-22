<?php include('header.php'); ?>

<div class="container my-5">
  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            #1 Kriteria
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <?php
          for ($i=1;$i<=$_POST['c'];$i++){ ?>
          <p><?php echo 'C'.$i.' :'.$_POST['c'.$i].' ('; if ($_POST['atb'.$i]=='k') echo 'Keuntungan)'; else echo 'Biaya)';?></p>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            #2 Hasil Normalisasi
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          	<?php
              $norm = array();
              for($j=1;$j<=$_POST['a'];$j++){
                for($i=1;$i<=$_POST['c'];$i++) $norm[$j][$i] = $_POST['a'.$j.$i]; 
              }
              for($i=1;$i<=$_POST['c'];$i++){
                $pref = 'c';
                ${$pref.$i} = $i ;
                ${'c'.$i} = array(); 
                  for($j=1;$j<=$_POST['a'];$j++){
                    ${'c'.$i}[$j] = $norm[$j][$i];
                  }

                $pref = 'max';
                ${$pref.$i} = $i ;
                ${'max'.$i} = max(${'c'.$i});

                $pref = 'min';
                ${$pref.$i} = $i ;
                ${'min'.$i} = min(${'c'.$i});
              }
            ?>
            <table class="table table-hover">
            <?php for($j=1;$j<=$_POST['a'];$j++) { ?>
              <tr>
                <?php for($i=1;$i<=$_POST['c'];$i++) { 
                $pref = 'nrm'; ?>
                <td><?php
                  if($_POST['atb'.$i]=='k') {
                    ${$pref.$j.$i} = $norm[$j][$i]/${'max'.$i};
                    echo ${'nrm'.$j.$i};
                  }
                  else {
                    ${$pref.$j.$i} = ${'min'.$i}/$norm[$j][$i];
                    echo ${'nrm'.$j.$i};
                  }
                ?></td>
                <?php } ?>
              </tr>
            <?php } ?>
            </table>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            #3 Hasil Pembobotan
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          <?php 
            $pref = 'v';
            for($j=1;$j<=$_POST['a'];$j++){
            $temp = 0 ;
              for($i=1;$i<=$_POST['c'];$i++){
                $temp = $temp+($_POST['c'.$i]*${'nrm'.$j.$i});
                ${$pref.$j} = $temp;

              }
            }
            $hasil = array();
              ?>
            <p><?php for($j=1;$j<=$_POST['a'];$j++){
            $hasil[$j] = ${'v'.$j};
            echo  'V'.$j.' : '.${'v'.$j};?></p>
            <?php }
            for($j=1;$j<=$_POST['a'];$j++){
            if(max($hasil)==${'v'.$j}){;?>

            <?php }} ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    <?php 
    $pref = 'v';
    for($j=1;$j<=$_POST['a'];$j++){
    $temp = 0 ;
      for($i=1;$i<=$_POST['c'];$i++){
        $temp = $temp+($_POST['c'.$i]*${'nrm'.$j.$i});
        ${$pref.$j} = $temp;

      }
    }
    $hasil = array();
      ?>
    <?php for($j=1;$j<=$_POST['a'];$j++){
    $hasil[$j] = ${'v'.$j};?>
    <?php }
    for($j=1;$j<=$_POST['a'];$j++){
    if(max($hasil)==${'v'.$j}){;?>
    <p>Nilai terbesar ada pada <b>V<?php echo $j; ?></b>, Yaitu  <b><?php echo max($hasil); ?></b> sehingga alternatif <b>A<?php echo $j; ?></b> adalah alternatif yang terpilih sebagai alternatif terbaik.</p>
    <?php }} ?>
  </div>
</div>

<div class="container my-5">
      <a type="button" href="http://localhost/saw-fauza/" class="btn btn-primary btn-lg btn-block">Hitung Lagi Dari Awal</a>
</div>

<?php include('footer.php'); ?>