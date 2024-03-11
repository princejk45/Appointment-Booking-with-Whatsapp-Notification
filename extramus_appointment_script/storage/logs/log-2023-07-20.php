<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-20 14:24:35 --> Email could not been sent. Mailer Error (Line 166): Could not instantiate mail function.
ERROR - 2023-07-20 14:24:35 --> #0 /home/gavirpkn/extramus.naijanetsolution.com/application/libraries/Notifications.php(94): EA\Engine\Notifications\Email->send_appointment_details(Array, Array, Array, Array, Array, Object(EA\Engine\Types\Text), Object(EA\Engine\Types\Text), Object(EA\Engine\Types\Url), Object(EA\Engine\Types\Email), Object(EA\Engine\Types\Text), 'Europe/Rome')
#1 /home/gavirpkn/extramus.naijanetsolution.com/application/controllers/Appointments.php(590): Notifications->notify_appointment_saved(Array, Array, Array, Array, Array, false)
#2 /home/gavirpkn/extramus.naijanetsolution.com/system/core/CodeIgniter.php(481): Appointments->ajax_register_appointment()
#3 /home/gavirpkn/extramus.naijanetsolution.com/index.php(341): require_once('/home/gavirpkn/...')
#4 {main}
