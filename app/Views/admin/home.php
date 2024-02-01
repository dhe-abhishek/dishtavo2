 <!-- page content -->
 <div class="right_col" role="main">
     <!-- top tiles -->
     <div class="row" style="display: inline-block;">
         <div class="col-md-12 col-sm-12 ">
             <div class="tile_count">
                 <div class="col-md-2 col-sm-4  tile_stats_count">
                     <span class="count_top"><i class="fa fa-book"></i> Total Courses</span>
                     <div class="count"><?php echo $courseCount['course_count']; ?></div>
                     <span class="count_bottom"></i></span>
                 </div>
                 <div class="col-md-2 col-sm-4  tile_stats_count">
                     <span class="count_top"><i class="fa fa-video-camera"></i> Total Videos</span>
                     <div class="count"><?php echo $videoCount['video_count']; ?></div>
                     <span class="count_bottom"></i></span>
                 </div>
                 <div class="col-md-2 col-sm-4  tile_stats_count">
                     <span class="count_top"><i class="fa fa-user"></i> Total Faculty</span>
                     <div class="count"><?php echo $facultyCount['faculty_count']; ?></div>
                     <span class="count_bottom"></i></span>
                 </div>
                 <div class="col-md-2 col-sm-4  tile_stats_count">
                     <span class="count_top"><i class="fa fa-film"></i> Total studio</span>
                     <div class="count"><?php echo $studioCount['studio_count']; ?></div>
                     <span class="count_bottom"></i></span>
                 </div>
                 <div class="col-md-2 col-sm-4  tile_stats_count">
                     <span class="count_top"><i class="fa fa-certificate"></i> Total Programmes</span>
                     <div class="count"><?php echo $programmeCount['programme_count']; ?></div>
                     <span class="count_bottom"></i></span>
                 </div>
                 <div class="col-md-2 col-sm-4  tile_stats_count">
                     <span class="count_top"><i class="fa fa-users"></i> Total Visitors</span>
                     <div class="count">732500</div>
                     <span class="count_bottom"></i></span>
                 </div>
             </div>
         </div>
     </div>
     <div class="clearfix"></div>
     <div class="row">
         <div class="col-md-4 col-sm-6  ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2><small>Programme wise Subject Count </small></h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <canvas id="bar-chart"></canvas>
                 </div>
             </div>
         </div>

         <div class="col-md-4 col-sm-6  ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2><small>Video Count for last 12 Months</small></h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <canvas id="mybarChart1"></canvas>
                 </div>
             </div>
         </div>

         <div class="col-md-4 col-sm-6  ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2>Donut Chart Graph <small>Sessions</small></h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <canvas id="canvasDoughnut"></canvas>
                 </div>
             </div>
         </div>

         <div class="col-md-4 col-sm-6  ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2>Radar Chart <small>Sessions</small></h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <canvas id="canvasRadar"></canvas>
                 </div>
             </div>
         </div>

         <div class="col-md-4 col-sm-6  ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2>Pie Area Chart <small>Sessions</small></h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <canvas id="polarArea"></canvas>
                 </div>
             </div>
         </div>

         <div class="col-md-4 col-sm-6  ">
             <div class="x_panel">
                 <div class="x_title">
                     <h2>Pie Chart Graph <small>Sessions</small></h2>
                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <canvas id="pieChart"></canvas>
                 </div>
             </div>
         </div>
     </div>
     <div class="clearfix"></div>
     <br />
 </div>
 <!-- /page content -->

 <script>
     $(document).ready(function() {

         $(function() {

             /*------------------------------------------
             Get the Bar Chart Canvas 
             Programme wise Subject Count
             --------------------------------------------*/

             const labels = JSON.parse(`<?php echo '["' . implode("\",\"", $programmeSubject) . '"]'; ?>`);
             const data = {
                 labels: labels,
                 datasets: [{
                     axis: 'y',
                     label: 'Programme wise Subject Count',
                     data: JSON.parse(`<?php echo '["' . implode("\",\"", $subjectCount) . '"]'; ?>`),
                     fill: false,
                     backgroundColor: [
                         'rgb(38,185,154)',
                         'rgb(3,88,106)'
                     ],
                     borderColor: [
                         'rgb(38,185,154)',
                         'rgb(3,88,106)'
                     ],
                     borderWidth: 1
                 }]
             };

             var ctx = $("#bar-chart");
             const config = {
                 type: 'bar',
                 data,
                 options: {
                     indexAxis: 'x',
                 }
             };

             var chart1 = new Chart(ctx, config);

         });

         $(function() {

             /*------------------------------------------
             Get the Bar Chart Canvas 
             Month Wise Video Count
             --------------------------------------------*/

             const labels = JSON.parse(`<?php echo '["' . implode("\",\"", $month) . '"]'; ?>`);
             const data = {
                 labels: labels,
                 datasets: [{
                     axis: 'y',
                     label: 'Month wise Video Count',
                     data: JSON.parse(`<?php echo '["' . implode("\",\"", $vCount) . '"]'; ?>`),
                     fill: false,
                     backgroundColor: [
                         'rgb(38,185,154)',
                         'rgb(3,88,106)'
                     ],
                     borderColor: [
                         'rgb(38,185,154)',
                         'rgb(3,88,106)'
                     ],
                     borderWidth: 1
                 }]
             };

             var ctx = $("#mybarChart1");
             const config = {
                 type: 'bar',
                 data,
                 options: {
                     indexAxis: 'x',
                 }
             };

             var chart1 = new Chart(ctx, config);

         });
     });
 </script>