  <body class="blue-grey lighten-5">
    <header>
      <?= $menu ?>
    </header>
    <!-- Examen doctorado -->
    <div class="row" >
      <div class=" col m2">

      </div>

      <?php
        if ($exams){
          foreach($exams->result() as $exam){?>
            <div class="card small-padding col s12 m4">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="https://www.colegiozamora.edu.mx/wp-content/uploads/2012/08/examen-en-EE-EE.jpg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?= $exam->name; ?><i class="material-icons right">more_vert</i></span>
                <p><a href="send/<?= $exam->id; ?>">Answer test</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Dear applicant <i class="material-icons right">close</i></span>
                <br>
                <b><?= $exam->name; ?></b>
                <p>
                  <?= $exam->description; ?>
                </p>
              </div>
            </div>
        <?php
          }
        }else{
          echo "Error: Empty";
        }
      ?>


      <div class=" col m2">

      </div>
    </div>
