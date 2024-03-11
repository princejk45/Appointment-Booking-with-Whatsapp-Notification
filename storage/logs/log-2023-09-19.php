<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-09-19 10:35:11 --> Email could not been sent. Mailer Error (Line 176): SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting
ERROR - 2023-09-19 10:35:11 --> #0 /home/gavirpkn/extramus.naijanetsolution.com/application/libraries/Notifications.php(94): EA\Engine\Notifications\Email->send_appointment_details(Array, Array, Array, Array, Array, Object(EA\Engine\Types\Text), Object(EA\Engine\Types\Text), Object(EA\Engine\Types\Url), Object(EA\Engine\Types\Email), Object(EA\Engine\Types\Text), 'Europe/Rome')
#1 /home/gavirpkn/extramus.naijanetsolution.com/application/controllers/Appointments.php(592): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/gavirpkn/extramus.naijanetsolution.com/system/core/CodeIgniter.php(481): Appointments->ajax_register_appointment()
#3 /home/gavirpkn/extramus.naijanetsolution.com/index.php(341): require_once('/home/gavirpkn/...')
#4 {main}
