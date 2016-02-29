<?php
/***
 * Routing page
 */
$banner = false;

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
        $banner = true;
        $include = 'camps';
        break;
    case '/events.html':
        $include = 'events';
        break;
    case '/news.html':
        $include = 'news';
        break;
    case '/signup.html':
        $include = 'signup';
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
        break;
}