
<div class="container-fluid">

          <!-- Page Heading -->
          <h2>Historial Movimientos</h2>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                         <div class="container">  
                 
                <div class="table-responsive" id="pagination_data">  
                </div>  
           </div> 
            </div>
          </div>

        </div>




  
 
     

 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"class/historial-movimientos.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>