<?php 
  
  function clandestino_get_categories() {
    $terms = get_the_terms( get_the_ID(), 'category');
    $categ = array();
    
    if ( $terms )
    {
    	foreach ($terms as $term) 
    	{
        $categ[] = array(
          'term_id'   => $term->term_id,
          'name' => $term->name
        );
    	}
    }
    else{
    	return;
    }

    return $categ;
  }

  function clandestino_display_categories  ($categories) {
    $template_li = '';
    $template_categories	= '';

    foreach ($categories as $term) {

      $cat_url = get_category_link($term['term_id']);
      $cat_name = $term['name'];

      $template_li .=
        "<li class='mr-2'>
          <a href='$cat_url' class='card-link'>
            $cat_name
          </a>
        </li>";
    }

    $template_categories = 
      "<ul class='d-flex mb-0 post_categories-list list-reset font-nav'>
        $template_li
      </ul>";



    return $template_categories;
  }

  function date_ES ($fecha) {
    $fecha = substr($fecha, 0, 10);
  
    $numeroDia = date('j', strtotime($fecha));
  
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $ano = date('Y', strtotime($fecha));
  
    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  
    $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  
    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  
    return $nombredia." ".$numeroDia." de ".$nombreMes.", ".$ano;
  }

