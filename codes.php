<?php

/* ********************************************************
 * JOIN two wordpress tables
 * var $currentDate -   Show the current date selected. 
 * var $showLimit   -   Show the limit using dropdown
 *********************************************************/
$myresult = $wpdb->get_results("SELECT * FROM $wpdb->ait_eventspro_dates a, $wpdb->posts b WHERE a.post_id = b.ID AND b.post_type = 'ait-event-pro' AND b.post_status = 'publish' AND a.date_from >= '$currentDate' ORDER BY a.date_from LIMIT $showLimit");



/*********************************************************
 * Use AJAX in wordpress
 *  
 *********************************************************/
add_action( 'wp_enqueue_scripts', 'ajax_test_enqueue_scripts' );
function ajax_test_enqueue_scripts() {
        
      wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/design/js/my.js', array('jquery') );
      wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
?>
<script>
    jQuery.ajax({
        url: my_ajax_object.ajax_url
    });
</script>
<?php



/********************************************************
 *  Display posts by archive i.e current month and previous months.
 *  You can edit the filter 'getarchives_where' according to your requiremnet.
 *********************************************************/
?>
<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1, 'post_type' => 'ait-event-pro' ) ); ?>

</select>

<?php
add_filter( 'getarchives_where', 'my_fancy_filter_function', 10, 2 );
function my_fancy_filter_function( $text, $r ) {
    $cur_mon = date('Y-m-01');
    return "WHERE post_type = 'ait-event-pro' AND post_status = 'future' AND post_date >= now()";
}



/*********************************************************
 * SPLIT database data into parts
 * var $z = 2018-03-12 2:23:00 has data
 * now we will use explode to split this data.
 *********************************************************/
$z = explode(" ", $y, 2);       // Output: Array( [0]=>2018-03-12 [1]=>2:23:00 )
$day = explode('-', $z[0], 3);  // Output: Array( [0]=>2018 [1]=>03 [2]=>12 )



/*********************************************************
 * CONVERTS the month Number into Name
 * i.e 03 -> Mar
 *********************************************************/
$dateObj   = DateTime::createFromFormat('!m', $day[1]);
$mName = $dateObj->format('M');



/*********************************************************
 * DISPLAY posts using 'date_query'
 *********************************************************/
$crdate = date("F j, Y");
            $crmnth = date('m');
            $cryear = date('Y');
            
$args = array(
    'post_type' => 'ait-event-pro',
    'post_status' => array('future', 'publish'),
    'date_query' => array(

            array(
                    'after'     => array(
                            'year'  => $cryear,
                            'month' => $crmnth,
                            'day'   => 01,
                    ),
                    'before'    => array(
                            'year'  => 2050,
                            'month' => 01,
                            'day'   => 01,
                    ),
                    'inclusive' => true,

            ),
    ),
    'posts_per_page' => -1,
);