<!doctype html>
<html>
<head>
   <meta charset="UTF-8">
   <link rel="shortcut icon" href="../../.favicon.ico">
   <title>ASIMOV AS—SOUND</title>

   <link rel="stylesheet" href="../../.style.css">
   <script src="../../.sorttable.js"></script>
</head>
<!-- STEP I : BUILD INDEX -->
<body>
<div id="container">
	<h1>ASIMOV AS—SOUND : split row texts into sentences and save its into a .json files</h1>
  <?php

$handle = @fopen("robot-series.txt/asimov isaac - robot 01 - the positronic man.txt", "r");
if ($handle)
{
  ?>
  <table>
    <tr><th><p>SENTENCE NUMBER</p></th><th><p style="text-align: center">SENTENCE CONTENT</p></th></tr>
  <?php

  $row[0]="";
  $ip[0]="";
  $reading_line_number = 0;

  while (!feof($handle))
  {
    $buffer .= fgets($handle);
    $sentences = array();
  }

  if($buffer!=="")
  {

    $row = preg_split( '/(?<=[.?!])\s+(?=[a-z,0-9])/i', $buffer );
    foreach( $row as $part ) {
      $sentences[$reading_line_number] = array( 'id' => $reading_line_number, 'text' => $part);
      $reading_line_number++;

      ?>
      <tr>
        <td><p style="text-align: center"><?php echo $reading_line_number; ?></p></td>
        <td><p><?php echo $part; ?></p></td>
      </tr>
      <?php
    }

  }
  ?>
</table>
<?php
}
fclose($handle);


$fp = fopen('robots-serie.json/01.json', 'w');
fwrite($fp, json_encode($sentences));
fclose($fp);

?>
?>
</div>
</body>
</html>
