<!-- add new categories --> 
<?php $category_parameters = array(
    "separator" => " - ", 
    "title_li" => "Category List" 
) ?>


<!-- Full list of categories -->
<h3>
    <?php 
        wp_list_categories( $category_parameters ); 
    ?>
</h3> 