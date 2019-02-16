<html>
   <head>
      <title>Import Movies</title>
   </head>
   <body>
      <?php echo $error;?>
      <?php echo form_open_multipart('upload/do_upload_json');?>
      <input type="file" name="userfile" />
      <br /><br />
      <input type="submit" value="upload" />
      </form>
   </body>
</html>