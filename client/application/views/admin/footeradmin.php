     </div>
              </div> 
               
            </div>
			
				 
                        
          </div> 
      </section>
          <div class="text-right">
          <div class="credits">
                
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="<?=base_url()?>assets/js1/jquery.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery-ui-1.10.4.min.js"></script>
    <script src="<?=base_url()?>assets/js1/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js1/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?=base_url()?>assets/js1/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?=base_url()?>assets/js1/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url()?>assets/js1/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?=base_url()?>assets/js1/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?=base_url()?>assets/js1/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="<?=base_url()?>assets/js1/calendar-custom.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?=base_url()?>assets/js1/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="<?=base_url()?>assets/js1/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?=base_url()?>assets/js1/sparkline-chart.js"></script>
    <script src="<?=base_url()?>assets/js1/easy-pie-chart.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?=base_url()?>assets/js1/xcharts.min.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery.autosize.min.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery.placeholder.min.js"></script>
	<script src="<?=base_url()?>assets/js1/gdp-data.js"></script>	
	<script src="<?=base_url()?>assets/js1/morris.min.js"></script>
	<script src="<?=base_url()?>assets/js1/sparklines.js"></script>	
	<script src="<?=base_url()?>assets/js1/charts.js"></script>
	<script src="<?=base_url()?>assets/js1/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

  </body>
</html>
