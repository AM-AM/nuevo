<?php 
$numero_pagina= numero_pagina($post_por_pagina,$conec);?>
<nav aria-label="Page navigation example">
<ul class="pagination">

  <?php if(pagina_actual() === 1){ ?>
    <li class="page-item disabled"><a class="page-link " href="#">Previous</a></li>
  <?php }else{ ?>
    <li class="page-item"><a class="page-link" href="adminReporte.php?p=<?php echo pagina_actual()-1  ?>">Previous</a></li>
  <?php };  ?>

  <?php for($i =1; $i <= $numero_pagina; $i++){  ?>
    <li class="page-item"><a class="page-link" href="adminReporte.php?p=<?php echo $i;  ?>"><?php echo $i;  ?></a></li>
  <?php };  ?>
    
    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
  </ul> 
</nav>