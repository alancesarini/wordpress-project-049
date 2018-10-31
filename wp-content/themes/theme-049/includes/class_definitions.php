<?php

if( !class_exists( 'Project049_Definitions' ) ) {

	class Project049_Definitions {

		private static $_this;

		private static $_version;

		public static $scripts_version;

		public static $posts_per_page;

		function __construct() {
		
			self::$_this = $this;

			self::$scripts_version = '1.0.3';
			
			self::$posts_per_page = 10;

		}

		static function this() {
		
			return self::$_this;
		
		}

	}

}

new Project049_Definitions();