<?php

if( isset( $_GET['character'] ) )
{

  $character_id = $_GET['character'];

  $row_data_handle = @fopen("../robots-serie.json/02.json", "r");
  $cross_data_handle = @fopen("../cross-data.json/main_character.json", "r");

  if ( $row_data_handle && $cross_data_handle && $character_id )
  {

    while ( !feof( $row_data_handle ) )
    {
      $row_data_buffer .= fgets( $row_data_handle );
    }
    while ( !feof( $cross_data_handle ) )
    {
      $cross_data_buffer .= fgets( $cross_data_handle );
    }
    if( $row_data_buffer && $cross_data_buffer )
    {
      $raw_text = json_decode( $row_data_buffer );
      $cross_data = json_decode( $cross_data_buffer );

      //$words = array();

      foreach ( $cross_data as $character ) {

        if( $character->id == $character_id ) {

          echo '<h3>' . $character->name . '</h3>';

          $pattern = preg_quote( $character->name, '/');
          $pattern = "/^.*$pattern.*\$/m";
          //$pattern = "/^eat\";

          foreach ($raw_text as $text) {

          if(preg_match_all($pattern, $text->text, $matches)){

            echo '<blockquote>';
            echo implode("\r\n", $matches[0]);
            echo '</blockquote>';
          }
          else{
             //echo "No matches found";
          }
          /*
            echo '<pre>';
            var_dump( $text );
            echo '</pre>';
            echo '<blockquote>' . $text->text . '</blockquote>';
          */
          }
        }
      }
    }
  }

} else {
  echo 'Échec : la requête n\'a pas aboutit.';
}

?>
