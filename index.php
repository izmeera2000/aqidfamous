<?php
session_start();

require('route.php');


function user_home(&$site_url)
{

	$current_page = 'home';
	require('views/user/home.php');
}
function user_about(&$site_url)
{
	$current_page = 'about';

	require('views/user/about.php');
}
function user_experience(&$site_url)
{
	$current_page = 'experience';

	require('views/user/experience.php');
}
function user_gallery(&$site_url)
{
	$current_page = 'gallery';

	require('views/user/gallery.php');
}

function user_contact(&$site_url)
{
	$current_page = 'contact';

	require('views/user/contact.php');
}
function server()
{

	require_once('admin/server.php');
}



//custom pages
function page404()
{
	require_once('views/404.php');

	// die('Page not found. Please try some different url.');
}


function check_session(&$site_url, $admin = 0)
{
	if (!isset($_SESSION['user_details'])) {


		header("location: " . $site_url . "login");

		if ($admin) {
			// var_dump($_SESSION['user_details']['role']);

			if (($_SESSION['user_details']['role'] != 1)) {
				// header("location: " . $site_url . "login");
				// session_destroy();
				// unset($_SESSION['user_details']);
				header("location: " . $site_url . "logout");

			}


		}
	}

}
function check_session2(&$site_url)
{
	if (isset($_SESSION['user_details'])) {


		header("location: " . $site_url . "dashboard");


	}

}

// debug_to_console2($current_url);

//If url is http://localhost/route/home or user is at the maion page(http://localhost/route/)
switch (true) {
	case ($request == '' || $request == '/'):
		// echo $request;
		user_home($site_url);
		break;
	case ($request == 'about'):
		// echo $request;
		user_about($site_url);
		break;
	case ($request == 'experience'):
		// echo $request;
		user_experience($site_url);
		break;
	case ($request == 'gallery'):
		// echo $request;
		user_gallery($site_url);
		break;
	case ($request == 'contact'):
		// echo $request;
		user_contact($site_url);
		break;

	default:
		// echo $request;
		// http_response_code(404);
		// page404();
		break;
}



