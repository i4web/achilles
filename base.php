<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>

<div class="main-wrapper" role="document">

<?php if (is_front_page()){
	  
	  //@todo add Slider/Image
      }
	  
	  else{
		//@todo add full width featured Image  
	  }
	  
?>

  <div class="content row">
    
    <main class="main" role="main">
    
    </main> <!-- end main element -->
    
    <?php //@todo add sidebar conditional option ?>
  
  </div>  <!-- end .content .row --> 

</div> <!-- end .main-wrapper -->
	 
<?php get_template_part('templates/footer'); ?>
 
</body>
</html>