<?php
/*
Plugin Name:Comment for Humans
Plugin URI: http://www.wp-fun.co.uk/comment-for-humans/
Description: Uses javascript links on comments to protest against search engine ranking being a reason to comment, or an expected reward for commenting.
Author: Andrew Rickmann
Version: 1.1
Author URI: http://www.wp-fun.co.uk
Generated At: www.wp-fun.co.uk;
*/ 

/*  Copyright 2008  Andrew Rickmann  (email : PLUGIN AUTHOR EMAIL)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists('cfh_comment_for_humans')) {
    class cfh_comment_for_humans	{

		
		/**
		* PHP 4 Compatible Constructor
		*/
		function cfh_comment_for_humans(){$this->__construct();}
		
		/**
		* PHP 5 Constructor
		*/		
		function __construct(){


		add_filter('get_comment_author_link', array(&$this,'the_link_intercept'));
		add_action("init", array(&$this,"add_scripts"));

		}
		
		
		
		/**
		* Called by the filter the_content
		*/
		function the_link_intercept( $link ){
			$url    = get_comment_author_url();
			$author = get_comment_author();
			
			if ( empty( $url ) || 'http://' == $url )
				$return = $author;
			else
				$return = '<span class="cfh-wrap"><span class="cfh-author">'.$author.'</span> (<span class="cfh-url">'.$url.'</span>)</span>';
		
			return $return;
		}
		
		
		/**
		* Tells WordPress to load the scripts
		*/
		function add_scripts(){
			wp_enqueue_script("jquery");
			wp_enqueue_script('comment_for_humans_script',  get_bloginfo('wpurl') . '/wp-content/plugins/comment-for-humans/js/script.js', array("jquery") , 0.1); 
		}
		

    }
}

//instantiate the class
if (class_exists('cfh_comment_for_humans')) {
	$cfh_comment_for_humans = new cfh_comment_for_humans();
}




?>