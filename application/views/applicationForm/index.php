<body class="blue-grey lighten-5">
  <header>
    <?= $menu ?>
  </header>
  <?= form_open("applicationForm/sendDocExam") ?>
  <div class="container">
    <div class="row">
      <div class="class s12 ">
        <h5>Test introduction</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="col s12 center-xs">

        <h4>Personal info</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p><br>
        <input type="hidden" name="idExam" value="<?= $idExam ?>">
        <div class="input-field col s6 m4">
          <input id="nombres" name="nombres" type="text" class="validate">
          <label for="nombres">Name</label>
        </div>
        <div class="input-field col s6 m4">
          <input id="apaterno" name="apaterno" type="text" class="validate">
          <label for="apaterno">middlename</label>
        </div>
        <div class="input-field col s6 m4">
          <input id="amaterno" name="amaterno" type="text" class="validate">
          <label for="amaterno">lastname</label>
        </div>
        <div class="input-field col s6 m4">
          <input id="email" name="email" type="text" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6 m4">
          <input id="ciudad" name="ciudad" type="text" class="validate">
          <label for="ciudad">City</label>
        </div>
      </div>
      <div class="row">
        <?php
        if ($questions){
          foreach($questions->result() as $q){?>
            <div class="card col m12 ">
              <div class="card-content wrap-text ">
                <span class="card-title"><?= $q->name; ?></span>
                <?php
                if($q->type==1){
                  if ($options){
                    foreach($options->result() as $option){
                      if($option->idQuestion==$q->id){
                  ?>
                    <div class="col s12">
                      <p>
                        <input id="<?= $option->id;?>" name="q<?= $q->id;?>" type="radio" value="<?= $option->id;?>" />
                        <label for="<?= $option->id;?>"><?= $option->name;?></label>
                      </p>
                    </div>
                <?php
                    }
                  }
                }
              }if($q->type==2){?>
                <br/>
                <p>  Write your answer here: </p>
                <div class="row">
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="q<?= $q->id; ?>" name="q<?= $q->id; ?>" ></textarea>
                        <div class="contador">

                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              <?php
              }?>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="col s6">
      </div>
      <div class="col s6">
        <button class=" btn waves-effect waves-light" type="submit" name="action">Send
          <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
  </div>
  <?= form_close() ?>
  <?php if ($idExam==1): ?>
    <script>
      $(document).ready(function(){
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.plugins.addExternal( 'wordcount', '<?= base_url() ?>libraries/wordcount/', 'plugin.js' );
        CKEDITOR.plugins.addExternal( 'notification', '<?= base_url() ?>libraries/notification/', 'plugin.js' );

        CKEDITOR.replace( 'q11' ,{
          extraPlugins: 'wordcount,notification'
        });
      });
    </script>
  <?php endif; ?>
  <?php if ($idExam==2): ?>
    <script>
      $(document).ready(function(){
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.plugins.addExternal( 'wordcount', '<?= base_url() ?>libraries/wordcount/', 'plugin.js' );
        CKEDITOR.plugins.addExternal( 'notification', '<?= base_url() ?>libraries/notification/', 'plugin.js' );

        CKEDITOR.replace( 'q24' ,{
          extraPlugins: 'wordcount,notification'
        });
      });
    </script>
  <?php endif; ?>

  <script>
  $(document).ready(function() {
   $('select').material_select();
  });
  </script>
