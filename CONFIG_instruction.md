CONFIG.PHP
Edit db  | User | Pass in config.php
Edit Base_Url

Enable Google AUTH 
Create Calendar Credentials and enter API information
================================================================

CRON JOB for /en/notification.php
*/5	*	*	*	*	/usr/bin/php /home/gavirpkn/extramus.naijanetsolution.com/en/notification.php
================================================================

In /en/notification.php
Edit db  | User | Pass
Edit Twilio Credentials | sid | token | phone
Edit $url in ln 40
Edit db in ln 47
Edit $companyName and $logoImageUrl in 61 | 62
Edit Extramus anywhere in case
================================================================

In /engine/Notifications/Email.php

Edit Twilio Credentials | sid | token | phone in 317
Edit Extramus anywhere in case
================================================================

For export to csv configuration
Change Ajax Url in application/views/backend/customers.php on ln 198
Also Edit db  | User | Pass in en/export.php

================================================================
OTHER ADMIN SETTINGS
Admin Url: $url/index.php/user/login
Individual Interviewer Calendars Sync
Individual Interviewer Work Schedule
Enable Notifications for Interviewers
Assign Interviews to respective Interviewers
GOOGLE ANALYTICS SETTINGS
