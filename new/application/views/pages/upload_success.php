<html>
   <head>
      <title>Upload Form</title>
   </head>
   <body>
      <h3>Your file was successfully uploaded!</h3>
      <p>
          <?php echo 'Imported Movies: ' . $imported . '<br>'?>
          <?php echo 'Failed Movies: ' . $failed . '<br>'?>
      </p>
      <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
   </body>
</html>