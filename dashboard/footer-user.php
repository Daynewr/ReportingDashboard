
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery-migrate-1.2.1.min.js"></script>


  <script src="js/raphael-2.1.0.min.js"></script>
  <script src="js/morris.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/dashboard.js"></script>


  <script src="js/jquery.datatables.min.js"></script>
  <script src="js/select2.min.js"></script>

  <script src="js/custom.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery.datatables.min.js"></script>
  <script src="js/jquery-ui-1.10.3.min.js"></script>
  <script src="js/jquery.jeditable.js"></script>
  <script src="js/jquery.cookies.js"></script>
  <script src="js/toggles.min.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/modernizr.min.js"></script>
  <script src="js/jquery.sparkline.min.js"></script>


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

      $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd"
      });
      $('.table-data').dataTable({
        "orderFixed": [ 0, 'desc' ]
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
    // Delete row in a table
        $('.delete-row').click(function(){
          var c = confirm("This will delete the row from the database as well and cannot be undone. \n\n ARE YOU SURE?");
          if(c) {
            jQuery(this).closest('tr').fadeOut(function(){
              var $id = $(this).children(':first-child').attr('id');
              $.post('db/dbPDO.php', {id : $id, fn : 'delete-user'}, function(data){console.log(data)});
              jQuery(this).remove();
            });
          }
            return false;
        });

              var chartObj = <?php echo $results_gplayinstalls_JSON; ?>;
              /***** MORRIS CHARTS *****/
              var m1 = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'line-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: chartObj,
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Current Installs', 'Daily Installs', 'Daily Uninstalls'],
                lineColors: ['#428BCA', '#1CAF9A', '#D9534F'],
                lineWidth: '2px',
                hideHover: true
              });

              /*var barObj = <?php echo $results_spend_rev_chart_JSON ?>;

              var m3 = new Morris.Bar({
            		// ID of the element in which to draw the chart.
            		element: 'bar-chart',
            		// Chart data records -- each entry in this array corresponds to a point on
            		// the chart.
            		data: barObj,
            		xkey: 'y',
            		ykeys: ['a', 'b'],
            		labels: ['Revenue','Spend'],
                barColors: ['#1CAF9A','#DF706D'],
            		lineWidth: '1px',
            		fillOpacity: 0.8,
            		smooth: false,
            		hideHover: true
            	});*/

    });
  </script>

  </body>
  </html>
