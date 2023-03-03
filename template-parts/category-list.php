<!-- add new categories --> 

<?php echo "category-list.php"; ?>

<span>Categories List => </span>

<!--<a href="http://localhost/jgdm_blog/category/">Category Home</a> | <a href="http://localhost/jgdm_blog/category/news/">News</a> | <a href="http://localhost/jgdm_blog/category/hundred_days_code/">#100daysofcode</a> | <a href="http://localhost/jgdm_blog/category/jgdm_feature/">JGDM Feature</a> | <a href="http://localhost/jgdm_blog/category/learning_journal/">Learning Journal</a> | <a href="http://localhost/jgdm_blog/category/news/">News</a> | <a href="http://localhost/jgdm_blog/category/news_and_comment/">News and Comment</a> | <a href="http://localhost/jgdm_blog/category/webdesign_news_comment/">Web Design News &amp; Comment</a>-->

<!-- Full list of categories -->
<h3><?php 
    wp_list_categories( " - "); 
    //get_categories(); ?>
</h3> 