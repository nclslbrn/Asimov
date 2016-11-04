$("#select-character li a.active").click(function() {

    var character_id = $(this).data("character");
    $(this).addClass('selected');

    var request = $.ajax({

      url : 'function.php/search-data-by-character.php?character=' + character_id,

      success : function(output, status) {

        $('#query-result').html( output );

        console.log( 'success' );
        //console.log( output );
      },

      error : function(result, status, error) {

        console.log( 'error' );

      },

      complete : function(result, status){

        console.log( 'complete' );

      }
    });

});
