<body class="blue-grey lighten-5">
  <header>
    <?= $menu ?>
  </header>
  <div class="container">
  <h2 class="header">Test list</h2>

<?php
if ($questions){
  foreach($questions->result() as $q){
    ?>

    <?php
      if($q->type==1){
    ?>

      <div class="col s12 m7">

        <div class="card horizontal">
          <div class="card-image">
            <img src="http://lorempixel.com/100/190/nature/6">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <h5><?= $q->name;?></h5>
            </div>
            <div class="card-action">
              <a ><?= $q->optionname; ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <?php
      if($q->type==2){
    ?>
    <div class="col s12 m7">

      <div class="card horizontal">
        <div class="card-image">
          <img src="http://lorempixel.com/100/190/nature/6">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <h5><?= $q->name;?></h5>
            <p><?= $q->textAnswer;?></p>
          </div>
          <div class="card-action">

          </div>
        </div>
      </div>
    </div>


    <?php
    }
    ?>
  <?php
  }
}

?>
  </div>
