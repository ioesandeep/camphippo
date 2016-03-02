<?php
header('WWW-Authenticate: Basic realm="Camp Hippo authentication"');
header('HTTP/1.0 401 Unauthorized');
echo 'Camp Hippo is owned and run by husband and wife team Jan & Gary Kilsby. Our Aim is to provide Healthy, Interesting, Practical, Physical and Organised acitivites and camps for children and adults alike. We are the leading provider in the area.';
exit;