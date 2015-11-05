<?php
    include('header.php');
 ?>

    <div class="pageheader">
      <h2><i class="fa fa-table"></i>3rd Party Data<span>API connection data</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">SPYR Games</a></li>
          <li class="active">3rd Party Data</li>
        </ol>
      </div>
    </div>
      <div class="contentpanel">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="clearfix mb30"></div>
            <h3>API Connection</h3>
            <div>
              <p>Click here to add an empty row to the table: <a href="#" id="add-row">Add Row</a></p>
            </div>
            <br />
            <div class="table-responsive">
            <table class="table table-striped" id="table2">
                <thead>
                   <tr>
                     <?php
                      $col_count = count(array_slice($col_table1,1));

                      foreach(array_slice($col_table1,1) as $single){
                        echo '<th>'.$single.'</th>';
                     } ?>
                      <th>Delete</th>
                   </tr>
                </thead>
          <?php
              $buffer = "<tbody>"; // start a table tag in the HTML

                foreach($results_table1 as $row){   //Creates a loop to loop through results
                  $buffer .= "<tr>";
                  for($i = 1; $i <= $col_count; $i++){
                    $buffer .="<td id='$row[0]-$col_table1[$i]'>".$row[$i]."</td>";
                  }
                  $buffer .="<td class='table-action'><a href='#' class='delete-row'><i class='fa fa-trash-o'></i></a></td></tr>";
                }

              $buffer .= "</tbody>"; //Close the table in HTML
              echo $buffer;
          ?>

          </div><!-- panel-body -->

        </div><!-- panel -->

      </div><!-- contentpanel -->

    </div><!-- mainpanel -->

  </section>

<?php include('footer.php') ?>
