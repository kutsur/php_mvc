<?php

	class Router {

		/**
		 * @var array $_listUri List of URI's to match against
		 */
		private $_listUri = array();

		/**
		 * @var array $_listCall List of closures to call
		 */
		private $_listCall = array();

		/**
		 * @var string $_trim Class-wide items to clean
		 */
		private $_trim = '/\^$';

		/**
		 * @var string $_trim Class-wide items to clean
		 */
		private $_notFoundFunction = null;

		/**
		 * @var string $_trim Class-wide items to clean
		 */
		private $_found = false;

		/**
		 * @var string $_routingMap Class-wide routing map handler
		 */
		private $_routingMap = null;

		/**
		 * @var string $_check_globals Flag for checking global-wide URIs
		 */
		private $_check_globals = true;

		public function __construct() {
			if (!isset($_REQUEST['uri'])) {
				$_REQUEST['uri'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			}
			$this->_notFoundFunction = function($args) {
				header("HTTP/1.1 404 Not Found");
				printf("<section>Page with &quot;%s&quot; was not found</section>", $args['requested_uri']);
				die();
			};
		}
		/**
		 * readRoutingMap - Reads "routes.php" file in root directory.
		 *
		 * @return void
		 */
		public function readRoutingMap() {
			if (file_exists('routes.php')) {
				include('routes.php');
			} else {
				header('HTTP/1.1 500 Internal Server Error');
				die('No router map found');
			}
		}
		/**
		 * add - Adds a URI and Function to the two lists
		 *
		 * @param string $uri A path such as about/system
		 * @param callable|object $function An anonymous function
		 */
		public function add($uri, callable $function) {
			if ($uri === "/") {
				$uri = "home";
			}
			$uri = trim($uri, $this->_trim);
			$this->_listUri[] = $uri;
			$this->_listCall[] = $function;
		}

		public function setNotFoundAction($notFoundFunction) {
			if (is_callable($notFoundFunction)) {
				$this->_notFoundFunction = $notFoundFunction;
				return true;
			} else {
				return false;
			}
		}
		public function triggerNotFound($uri) {
			$arguments = ['requested_uri' => $uri];
			call_user_func_array($this->_notFoundFunction, [$arguments]);
		}
		/**
		 * submit - Looks for a match for the URI and runs the related function
		 */
		public function submit() {
			$this->readRoutingMap();
			$uri = 'home';
			if (isset($_REQUEST['uri']) && $_REQUEST['uri'] !== '/' && !empty($_REQUEST['uri'])) {
				$uri = $_REQUEST['uri'];
				$uri = trim($uri, $this->_trim);
			}
			$replacementValues = array();
			/**
			 * List through the stored URI's
			 */
			foreach ($this->_listUri as $listKey => $listUri) {
				/**
				 * See if there is a match
				 */
				if (preg_match("#^$listUri$#", $uri)) {
					/**
					 * Replace the values
					 */
					$realUri = explode('/', $uri);
					$fakeUri = explode('/', $listUri);
					$this->_found = true;
					/**
					 * Gather the .+ values with the real values in the URI
					 */
					foreach ($fakeUri as $key => $value) {
						if ($value == '.+') {
							$replacementValues[] = $realUri[$key];
						}
					}
					/**
					 * Pass an array for arguments
					 */
					call_user_func_array($this->_listCall[$listKey], $replacementValues);
				}
			}
			if ($this->_found == false) {
				if (is_callable($this->_notFoundFunction)) {
					$arguments = ['requested_uri' => $uri];
					call_user_func_array($this->_notFoundFunction, [$arguments]);
				}
				return false;
			} else {
				return true;
			}
		}
	}
