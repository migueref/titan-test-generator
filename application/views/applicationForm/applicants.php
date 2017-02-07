<body class="blue-grey lighten-5">
  <header>
    <?= $menu ?>
  </header>
  <div class="container">
  <h2 class="header">Applicant list</h2>

<?php
if ($questions){
  foreach($questions->result() as $q){
    ?>


      <div class="col s12 m7">

        <div class="card horizontal">
          <div class="card-image">
            <img src="http://lorempixel.com/100/190/nature/6">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <span> <?= $q->created_at; ?></span>
              <h5><?= $q->firstname." ".$q->middlename." ".$q->lastname;?></h5>
              <span> <?= $q->program; ?></span>

            </div>
            <div class="card-action">
              <a href="<?= base_url(); ?>index.php/applicationForm/applicants/<?= $q->id; ?>">Show answers</a>
            </div>
          </div>
        </div>
      </div>


  <?php
  }
}

?>
  </div>
