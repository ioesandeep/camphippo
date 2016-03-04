<?php
/***
 * Routing page
 */
$banner = false;
$styles = array();
$scripts = array();
$title = isset($pageData['title']) ? $pageData['title'] : (isset($pageData['page_title']) ? $pageData['page_title'] : Site::application());

//Route by url
switch ($url) {
    case '/home.html':
        $include = 'home';
        break;
    case '/about-us.html':
        $include = 'about';
        $banner = true;
        break;
    case '/contact.html':
        $include = 'contact';
        break;
    case '/lifeguarding.html':
    case '/kids-camps.html':
    case '/triathlons.html':
    case '/trampolining.html':
    case '/swim-school.html':
    case '/cheerleading.html':
        $banner = true;
        $include = 'camps';
        break;
    case '/events.html':
        $include = 'events';
        $styles = array('fullcalendar.min.css', 'fullcalendar.print.css');
        $scripts = array('moment.min.js', 'fullcalendar.min.js');
        break;
    case '/news.html':
        $include = 'news';
        break;
    case '/signup.html':
        $include = 'signup';
        break;
    case '/parental-consent-form.html':
    case '/parental-consent.html':
        $include = 'consent-form';
        $scripts = array('jSignature.js');
        break;
    case '/enrollment-form.html':
        $include = 'enrollment-form';
        $scripts = array('jSignature.js');
        break;
    case '/payment.html':
        $include = 'payment';
        break;
    default:
        $banner = true;
        $include = 'details';
}

//Route by table name
switch ($rewriteData['table_name']) {
    case 'camps':
        $banner = true;
        $include = 'camp-details';
        break;
    case 'events':
        break;
    case 'news':
        $include = 'news-details';
        $banner = false;
        break;
}