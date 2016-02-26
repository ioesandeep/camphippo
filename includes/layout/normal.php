<?php
switch ($url) {
    case '/home.html':
        $include = 'home';
        break;
    case '/about-us.html':
        $include = 'about';
        break;
    case '/contact.html':
        $include = 'contact';
        break;
    case '/lifeguarding.html':
    case '/kids-camps.html':
    case '/triathlons.html':
    case '/trampolining.html':
        $include = 'camps';
        break;
    case '/events.html':
        $include = 'events';
        break;
    case '/news.html':
        $include = 'news';
        break;
    default:
        $include = 'details';
}
switch ($rewriteData['table_name']) {
    case 'camps':
        $include = 'camp-details';
        break;
    case 'events':
        break;
    case 'news':
        $include = 'news-details';
        break;
}