<?php defined('BASEPATH') or exit('No direct script access allowed');

// Add custom values by setting them to the $config array.
// Example: $config['smtp_host'] = 'smtp.gmail.com';
// @link https://codeigniter.com/user_guide/libraries/email.html

$config['useragent'] = 'Extramus';
$config['protocol'] = 'smtp'; // Use SMTP instead of 'mail'
$config['mailtype'] = 'html'; // or 'text'
$config['smtp_debug'] = 0; // Set to 1 for debugging, 0 for production
$config['smtp_auth'] = TRUE; // or FALSE for anonymous relay.
$config['smtp_host'] = 'server258.web-hosting.com';
$config['smtp_user'] = 'noreply@extramus.naijanetsolution.com';
$config['smtp_pass'] = 'fresh2354';
$config['smtp_crypto'] = 'ssl'; // or 'tls'
$config['smtp_port'] = 465; // Change to 587 if using 'tls'
