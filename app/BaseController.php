<?php
	// require_once 'DataBase.php';

	class BaseController {
		private static $registry;

		static function register($module, $instance) {
			self::$registry[$module] = $instance;
		}

		static function get($module) {
			return isset(self::$registry[$module]) ? self::$registry[$module] : null;
		}
	}
	
