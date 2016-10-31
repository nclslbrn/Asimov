$("#select-character li a.active").click(function() {

    var character_id = $($(this).data("character"));

    //console.log( character_id );

    $.ajax({
      url : 'http://archive.local/asimov-as-sound/function.php/search-data-by-character.php',
      type : 'GET',
      data : 'character_id=' + character_id,

      success : function(output, status) {

        //$('#query-result').html( output );

        console.log( 'success' );
        console.log( output );
      },

      error : function(result, status, error) {

        console.log( 'error' );

      },

      complete : function(result, status){

        console.log( 'complete' );

      }
    });

});
