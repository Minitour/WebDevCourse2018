<html>
   <head>
      <title>Import Movies</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="<?php echo base_url('assets/less/upload.css');?>" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <?php echo form_open_multipart('upload/do_upload_json');?>
         <input type="file" name="userfile" />
         <br/><br/>
         <input type="submit" value="upload" />
         </form>
      </div>

      <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
   </body>
</html>