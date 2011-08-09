<?php 
// Check if the Core is already imported.
if (defined('FaabBB'))
	exit();
	
// We define this constant, so Core classes can check that they are imported by the core.
define('FaabBB', true);

// We define this constants, so importing core classes is easier.
define('CORE_FOLDER', dirname(__FILE__));
define('PHP_SUFFIX', '.php');

// Define the directory seperator.
define('DS', DIRECTORY_SEPARATOR);

// Here we import the core classes.
include(CORE_FOLDER . DS . 'CoreConfiguration' . PHP_SUFFIX);
include(CORE_FOLDER . DS . 'CoreState' . PHP_SUFFIX);
include(CORE_FOLDER . DS . 'CoreLogger' . PHP_SUFFIX);
include(CORE_FOLDER . DS . 'CoreLibraryLoader' . PHP_SUFFIX);
include(CORE_FOLDER . DS . 'CoreErrorHandler' . PHP_SUFFIX);



/**
 * Represents the <code>core</code> of this weAug 08, 2011 15:51:15 PM Core init
INFO: Loading FaabBB 3.006 ALPHA
Aug 08, 2011 15:51:15 PM Core init
INFO: Disabling error reporting.
Aug 08, 2011 15:51:15 PM Core init
INFO: Done disabling error reporting.
Aug 08, 2011 15:51:15 PM Core init
INFO: Initializing CoreErrorHandler.
Aug 08, 2011 15:51:15 PM CoreErrorHandler init
INFO: Setting error handler to CoreErrorHandler::onError
Aug 08, 2011 15:51:15 PM CoreErrorHandler init
INFO: Setting error handler to CoreErrorHandler::onException
Aug 08, 2011 15:51:15 PM CoreErrorHandler init
INFO: Registering shutdown function  CoreErrorHandler::onShutdown
Aug 08, 2011 15:51:15 PM CoreErrorHandler init
INFO: CoreErrorHandler initialized.
Aug 08, 2011 15:51:15 PM Core init
INFO: Initializing CoreLibraryLoader.
Aug 08, 2011 15:51:15 PM CoreLibraryLoader init
INFO: Core libraries successfully loaded.
Aug 08, 2011 15:51:15 PM CoreErrorHandler onShutdown
SEVERE: Runtime shutdown unexpectedly.
Runtime error in thread "main"
	at CoreErrorHandler::onShutdown
bpage. The {@link Core} class will receive 
 * 	incomming requests and handle them.
 * The core will load the {@link Core} components and will check for errors. The {@link Core} class 
 * 	will never use any files of the FaabBB class library, so the {@link Core} uses 
 * 	pre-defined functions, variables and classes that comes along with the PHP function library 
 * 	that can be found at <a href="http://php.net/manual/en/funcref.php">http://php.net/manual/en/funcref.php</a> or
 * 	classes from the Core library.
 * The {@link Core} uses a static pattern which means there's only one {@link Core}. 
 * 
 * @category Core
 * @version Version 3.007 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Core {
	
	/**
	 * This variable contains the {@link State} we're in. 
	 */
	public static $STATE = CoreState::INIT;
	
	/**
	 * Updates the current core state.
	 * 
	 * @param $state The state to update to.
	 */
	public static function checkpoint($state) {
		self::$STATE = $state;
	}
	 
	
	
	/**
	 * Initializes the {@link Core} for use.
	 * This method will load the <code>core</code> libraries and components, define global constants, 
	 * 	load the Command line interface and finally loads the FaabBB class library.
	 * This method should not be invoked by any classes. Ofcourse FaabBB will check this.
	 * 
	 * @since Version 3.006 ALPHA
	 */
	 public static function init() {	
	 	if (self::$STATE != CoreState::INIT) {
	 		// Method invoked when Core is already initialized.
	 		CoreLogger::warning("Core::init() invoked when Core is already initialized.");
	 		return;
	 	}
	 	CoreLogger::info("Loading FaabBB " . FaabBB_VERSION);
	 	CoreLogger::info("Disabling error reporting.");
	 	error_reporting(0);
	 	CoreLogger::info("Done disabling error reporting.");
	 	CoreLogger::info("Initializing CoreErrorHandler.");
	 	CoreErrorHandler::init();
	 	CoreLogger::info("Initializing CoreLibraryLoader.");
	 	CoreLibraryLoader::init();
	 	
	 	 
	 	// Successfully initialized.
	 	self::checkpoint(CoreState::INVOKE);
	 }
	 
	 /**
	  * Invokes the {@link Application}s and the main method.
	  * After this process, FaabBB is successfully loaded and the HTTP response is send.
	  * 
	  * @since Version 3.006 ALPHA
	  */
	  public static function invoke() {
	  	// Can not invoke.. Core state is wrong.
	  	if (self::$STATE != CoreState::INVOKE) {
	 		CoreLogger::warning("Can not invoke.. Core state is wrong.");
	 		return;
	 	}
	  	// TODO: Finish this.
	  	
	  	self::checkpoint(CoreState::SUCCESS);
	  }
	
	
}

// Initialize the Core after defining the Core class.
Core::init();
