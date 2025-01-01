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
	$page_title = "About";
	$page_description = "about";
	$breadcrumbs = [
		['label' => 'Home', 'url' => $site_url, 'active' => false],
		['label' => 'About', 'url' => $site_url . '/about', 'active' => true],
	];
	require('views/user/about.php');
}
function user_experience(&$site_url)
{
	$current_page = 'experience';
	$page_title = "Experience";
	$page_description = "experience";
	$breadcrumbs = [
		['label' => 'Home', 'url' => $site_url, 'active' => false],
		['label' => 'Experience', 'url' => $site_url . '/experience', 'active' => true],
	];
	require('views/user/experience.php');
}
function user_gallery(&$site_url)
{
	$current_page = 'gallery';
	$page_title = "Gallery";
	$page_description = "gallery";
	$breadcrumbs = [
		['label' => 'Home', 'url' => $site_url, 'active' => false],
		['label' => 'Gallery', 'url' => $site_url . '/gallery', 'active' => true],
	];
	require('views/user/gallery.php');
}

function user_contact(&$site_url)
{
	$current_page = 'contact';
	$page_title = "Contact";
	$page_description = "Contact";
	$breadcrumbs = [
		['label' => 'Home', 'url' => $site_url, 'active' => false],
		['label' => 'Contact', 'url' => $site_url . '/contact', 'active' => true],
	];
	require('views/user/contact.php');
}

function admin_dashboard(&$site_url)
{

	$current_page = 'dashboard';
	$page_title = "Dashboard";

	$breadcrumbs = [
		['label' => 'Home', 'url' => $site_url . 'admin', 'active' => false],
		['label' => 'Dashboard', 'url' => $site_url . '/', 'active' => true],
	];


	require('views/admin/dashboard.php');
}


function server()
{

	require_once('app/server.php');
}



//custom pages
function page404()
{
	require_once('views/404.php');

	// die('Page not found. Please try some different url.');
}

function render_title_breadcrumbs($page_title, $page_description, $breadcrumbs)
{
	echo '<div class="page-title" data-aos="fade">';

	// Page Title and Description
	echo '<div class="heading">';
	echo '<div class="container">';
	echo '<div class="row d-flex justify-content-center text-center">';
	echo '<div class="col-lg-8">';
	echo '<h1>' . htmlspecialchars($page_title) . '</h1>';
	echo '<p class="mb-0">' . htmlspecialchars($page_description) . '</p>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	// Breadcrumbs
	if (!empty($breadcrumbs)) {
		echo '<nav class="breadcrumbs">';
		echo '<div class="container">';
		echo '<ol>';
		foreach ($breadcrumbs as $breadcrumb) {
			if (!empty($breadcrumb['active'])) {
				// Current page (active breadcrumb)
				echo '<li class="current">' . htmlspecialchars($breadcrumb['label']) . '</li>';
			} else {
				// Non-active breadcrumb with a link
				echo '<li><a href="' . htmlspecialchars($breadcrumb['url']) . '">' . htmlspecialchars($breadcrumb['label']) . '</a></li>';
			}
		}
		echo '</ol>';
		echo '</div>';
		echo '</nav>';
	}

	echo '</div>';
}
function render_title_breadcrumbs2($title, $breadcrumbs = [])
{
	// Open the container div for page title
	echo '<div class="pagetitle">';

	// Print the page title (h1)
	echo '<h1>' . htmlspecialchars($title) . '</h1>';

	// Open the breadcrumb navigation
	echo '<nav>';
	echo '<ol class="breadcrumb">';

	// Loop through each breadcrumb item
	foreach ($breadcrumbs as $breadcrumb) {
		// Check if this breadcrumb is marked as active
		if ($breadcrumb['active']) {
			// Active breadcrumb
			echo '<li class="breadcrumb-item active">' . htmlspecialchars($breadcrumb['label']) . '</li>';
		} else {
			// Regular breadcrumb with a link
			echo '<li class="breadcrumb-item"><a href="' . htmlspecialchars($breadcrumb['url']) . '">' . htmlspecialchars($breadcrumb['label']) . '</a></li>';
		}
	}

	// Close the breadcrumb list and navigation
	echo '</ol>';
	echo '</nav>';

	// Close the page title div
	echo '</div>';
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


	case (str_contains($request, 'visitor_info')):
		// echo $request;
		server();
		break;
	case (str_contains($request, 'visitor_click')):
		// echo $request;
		server();
		break;

		case (str_contains($request, 'get_visitor_data')):
			// echo $request;
			server();
			break;
	case ($request == 'admin' || $request == 'admin/'):
		// echo $request;
		admin_dashboard($site_url);
		break;

	default:
		// echo $request;
		// http_response_code(404);
		// page404();
		break;
}



