<?php include 'templates/header.php'; ?>

<main id="container" class="full">
  <div class="content full">
    <nav class="sidebar small">
      <?php

      $cross_data_handle = @fopen("cross-data.json/main_character.json", "r");

      if ( $cross_data_handle ) {

        while ( !feof( $cross_data_handle ) ) {

          $cross_data_buffer .= fgets( $cross_data_handle );

        }
        if( $cross_data_buffer ) {

          $cross_data = json_decode( $cross_data_buffer );

          echo '<ul id=\'select-character\'>';

          foreach ( $cross_data as $character ) {

            echo '<li>';
            echo '<a href=\'#\' data-character=\''.$character->id.'\''.(($character->name !== 'unknow')? 'class=\'active\'': 'class=\'inactive\'').'>'. $character->name .'</a>';
            echo '</li>';

          }
          echo '</ul>';
        }
      }
    ?>
  </nav>
  <article class="xlarge">

    <div class="content">
      <div id="query-result" class="blockquote-result">

        <!-- ajax content -->

      </div>
    </div>

  </article>
</main>
<?php include 'templates/footer.php'; ?>
