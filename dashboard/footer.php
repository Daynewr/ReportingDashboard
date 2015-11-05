
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="js/jquery-ui-1.10.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modernizr.min.js"></script>
  <script src="js/jquery.sparkline.min.js"></script>
  <script src="js/toggles.min.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/jquery.cookies.js"></script>

  <script src="js/flot/jquery.flot.min.js"></script>
  <script src="js/flot/jquery.flot.resize.min.js"></script>
  <script src="js/flot/jquery.flot.spline.min.js"></script>
  <script src="js/morris.min.js"></script>
  <script src="js/raphael-2.1.0.min.js"></script>
  <script src="js/dashboard.js"></script>

  <script src="js/jquery.datatables.min.js"></script>
  <script src="js/select2.min.js"></script>

  <script src="js/custom.js"></script>

  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modernizr.min.js"></script>
  <script src="js/jquery.sparkline.min.js"></script>
  <script src="js/toggles.min.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/jquery.cookies.js"></script>
  <script src="js/jquery.datatables.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/jquery.jeditable.js"></script>
  <script>
    jQuery(document).ready(function() {

      "use strict";

      $('.nav a').filter(function(){
          return this.href==location.href
        }).parent().addClass('active').siblings().removeClass('active');

      $('.nav a').click(function(){
          $(this).parent().addClass('active').siblings().removeClass('active')
        });


      $('#add-row').click(function(event){
          console.log('add button clicked');
          event.preventDefault();
          $.post('db/dbPDO.php', {fn : 'add'});
          location.reload();

      });

        //jQuery('#table1').dataTable();
        jQuery('#table2').dataTable({
          "sPaginationType": "full_numbers"
        });

      // Select2
      /*jQuery('select').select2({
          minimumResultsForSearch: -1
      });

      jQuery('select').removeClass('form-control');
      */

      // Show action upon row hover
        jQuery('.table-hidaction tbody tr').hover(function(){
          jQuery(this).find('.table-action-hide a').animate({opacity: 1});
        },function(){
          jQuery(this).find('.table-action-hide a').animate({opacity: 0});
        });

        //causes table edits to delay until PHP loads
            $('td:not(.table-action)').editable('db/dbPDO.php', {
                  name   : 'input',
            submitdata   : { fn : "update" },
                  type   : 'text',
                  cancel : '<button class="btn btn-xs btn-default" type="cancel" >Cancel</button>',
                  submit : '<button class="btn btn-xs btn-primary" type="submit" >Ok</button>',
            });
            // Delete row in a table
            $('.delete-row').click(function(){
              var c = confirm("This will delete the row from the database as well and cannot be undone. \n\n ARE YOU SURE?");
              if(c) {
                jQuery(this).closest('tr').fadeOut(function(){
                  var $id = $(this).children(':first-child').attr('id');
                  $.post('db/dbPDO.php', {id : $id, fn : 'delete'}, function(data){console.log(data)});
                  jQuery(this).remove();
                });
              }
                return false;
            });
    });
  </script>

  </body>
  </html>
