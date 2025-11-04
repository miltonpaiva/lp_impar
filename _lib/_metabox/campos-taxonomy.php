<?php

    add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes_tax');
    function wpcf_meta_boxes_tax($meta_boxes) {


		//==============================================
		// BLOG exemplo
		//==============================================
        // $meta_boxes[] = array(
        //     'id'         => 'term_post',
        //     'title'      => '',
        //     'taxonomies' => 'category',
        //     'fields' => array(

        //         array(
        //             'id'   => 'color_cta_category',
        //             'name' => 'Cor do Flag',
        //             'type' => 'color',
        //             'tab'     => 'card',
        //           ),

        //     )
        // );
		

		

   
        return $meta_boxes;
    }