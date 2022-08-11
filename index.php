<?php
date_default_timezone_set("Asia/Jakarta");
// DELETE FROM blp_depo;
// DELETE FROM blp_loadinglist;
// DELETE FROM blp_cargomanifest;
// DELETE FROM blp_penjualan;
// DELETE FROM blp_payment;
// DELETE FROM blp_paytunai;
// DELETE FROM blp_invoice;

// DELETE FROM blp_depo;
// DELETE FROM blp_loadinglist;
// DELETE FROM blp_penjualan;
// DELETE FROM `blp_payment`;
// DELETE FROM `blp_invoice`;
// DELETE FROM `blp_paytunai`;
// DELETE FROM `blp_reminder`;
// DELETE FROM `blp_cargomanifest`;
// DELETE FROM `blp_notif`;
// UPDATE `blp_seal` SET `terjual` = NULL;

// DELETE FROM blp_cargomanifest;
// DELETE FROM blp_depo;
// DELETE FROM blp_depostatus;
// DELETE FROM blp_invoice;
// DELETE FROM blp_loadinglist;
// DELETE FROM blp_logakses;
// DELETE FROM blp_notif;
// DELETE FROM blp_payment;
// DELETE FROM blp_paytunai;
// DELETE FROM blp_reminder;
// DELETE FROM blp_harga;
// DELETE FROM blp_hargabeli;
// DELETE FROM blp_custharga;
// DELETE FROM blp_penjualan;
// DELETE FROM blp_reminder;

// DELETE FROM blp_depo;
// DELETE FROM blp_invoice;
// DELETE FROM blp_loadinglist;
// DELETE FROM blp_cargomanifest;
// DELETE FROM blp_payment;
// DELETE FROM blp_paytunai;
// DELETE FROM blp_penjualan;
// DELETE FROM blp_reminder;
// DELETE FROM blp_belirc;
// DELETE FROM blp_belivendor;
// DELETE FROM blp_biayalainbeli;
// DELETE FROM blp_biayalainjual;

// SOP STOK DEPO (DONE)
// 1. admin menambahkan data di (GATE IN) dengan status EMPTY sebagai stok depo
// 2. container keluar dari depo admin membuat transaksi (GATE OUT) dengan status EMPTY stok depo  
// catatan : tidak ada biaya lift on dan lift off karena 
// belum disewa customer

// SOP PERSEWAAN CONTAINER (DONE)
// 1. container keluar dari depo (GATE OUT) dengan status EMPTY dari stok depo
// 2. kena BIAYA LIFT ON dan diterima di pembayaran tunai
// 3. container masuk depo (GATE IN) dengan status EMPTY sebagai stok depo
// 4. kena BIAYA LIFT OFF dan diterima di pembayaran tunai
// 5. sistem membuat penjualan dengan tipe SEWA
// 6. split penjualan persewaan container
// 7. invoice persewaan container
// 8. pembayaran invoice persewaan container


// SOP PENGIRIMAN CONTAINER MENGGUNAKAN CONTAINER BLP (DONE)
// 1. container keluar dari depo (GATE OUT) dengan status EMPTY dari stok depo
// 2. kena BIAYA LIFT ON dan diterima di pembayaran tunai
// 3. container masuk depo dan dicatat di (MUATAN IN) dengan status FULL sebagai penjualan 
// 4. jika dari container keluar (BONGKARAN OUT) dengan masuk (GATE IN) lebih dari 2 hari kena BIAYA DETENTION 
// 5. penerimaan pembayaran tunai BIAYA DETENTION & BIAYA KULI jika ada
// 6. penerimaan pembayaran tunai BIAYA LIFT ON 
// 7. loading list 
// 8. cargo manifest
// 9. sistem otomatis mencatat container di (MUATAN OUT)
// 10. sistem membuat penjualan dengan tipe PENGIRIMAN
// 11. split penjualan 
// 12. invoice persewaan container
// 13. pembayaran invoice
// 14. admin mencatat container di (BONGKARAN OUT) dengan status FULL akan diambil customer 
// 15. jika ada (BIAYA KULI) akan dicatat di pembayaran tunai
// 15. container masuk depo jakarta (GATE IN) dengan status EMPTY menjadi stok Jakarta


//  SOP PERSEWAAN CONTAINER MENGGUNAKAN CONTAINER CUSTOMER
// 1. container masuk depo (GATE IN) dengan status FULL 
// 2. kena BIAYA LIFT ON dan diterima di pembayaran tunai
// 3. container keluar depo dan dicatat di (GATE OUT) full 
// 4. kena BIAYA LIFT OFF dan diterima di pembayaran tunai
// 4. container siap dimuat dan dicatat di (MUATAN IN) full 
// 5. loading list 
// 6. cargo manifest
// 7. sistem otomatis mencatat container di (MUATAN OUT)
// 8. sistem membuat penjualan dengan tipe PENGIRIMAN
// 9. split penjualan 
// 10. invoice persewaan container
// 11. pembayaran invoice
// 12. admin mencatat container di (BONGKARAN OUT) full akan diambil customer 
// 13.. jika ada (BIAYA KULI) akan dicatat di pembayaran tunai
// 14. container diambil oleh customer


/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 *
 */
	$application_folder = 'application';

/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here.  For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT:  If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller.  Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 *
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.  Example:  Mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 *
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once BASEPATH.'core/CodeIgniter.php';

/* End of file index.php */
/* Location: ./index.php */