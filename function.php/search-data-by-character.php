<?php
if( isset( $_GET['character_id']) )
{
  $character_id = $_GET['character_id'];
  $row_data_handle = @fopen("robots-serie.json/01.json", "r");
  $cross_data_handle = @fopen("cross-data.json/main_character.json", "r");

  echo $character_id;

  if ($row_data_handle && $cross_data_handle && $character_id)
  {
    while ( !feof($row_data_handle) )
    {
      $row_data_buffer .= fgets( $row_data_handle );
    }
    while ( !feof( $cross_data_handle ) )
    {
      $cross_data_buffer .= fgets( $cross_data_handle );
    }
    if( $row_data_buffer!=="" && $cross_data_buffer )
    {
      $raw_text = json_decode( $row_data_buffer );
      $cross_data = json_decode( $cross_data_buffer );

      $words = array();

      foreach ( $cross_data as $character ) {

        echo $character->name;

        if( $character->id == $character_id ) {

          echo 'blablablablablalba';

          foreach ($raw_text as $text) {

            echo '<blockquote>' . $text . '</blockquote>';

          }
        }
      }
    }
  }
} else {
  echo 'Échec : la requête n\'a pas aboutit.';
}

?>
