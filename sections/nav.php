<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
            <a class="navbar-brand page-scroll" href="accueil"> <i class="fa fa-paper-plane-o"></i>GB</a> </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse" id="menu">
            <ul class="nav navbar-nav">
                   <?php			
				if(isset($_GET['page'])) {
				if($page=="presentation"){
					
					?>
                    <li class="hidden"><a href=""></a></li>
                    <li><a class="page-scroll" href="accueil">Accueil</a></li>
                    <li><a class="page-scroll" href="">Photos</a></li>
                    <li><a class="page-scroll" href=""></a></li>
                    <li><a class="page-scroll" href=""></a></li>
                     <?php
                  }
                 
				if($page=="formulaire"){
					?>
                    <li class="hidden"><a href=""></a></li>
                    <li><a class="page-scroll" href="accueil">Accueil</a></li>
                    <li><a class="page-scroll" href="">Video</a></li>
                    <li><a class="page-scroll" href=""></a></li>
                    <li><a class="page-scroll" href=""></a></li>
                    <?php
                  }
				}
				
               else{
				   
					?>
                    <li class="hidden"><a href=""></a></li>
                    <li><a class="page-scroll" href="presentation">Présentation</a></li>
                    <li><a class="page-scroll" href="">Photos</a></li>
                    <li><a class="page-scroll" href=""></a></li>
                    <li><a class="page-scroll" href=""></a></li>
                    <?php
                  }
				
				?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>

</nav>