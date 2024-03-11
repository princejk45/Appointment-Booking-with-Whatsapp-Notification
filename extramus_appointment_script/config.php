<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * Easy!Appointments Configuration File
 *
 * Set your installation BASE_URL * without the trailing slash * and the database
 * credentials in order to connect to the database. You can enable the DEBUG_MODE
 * while developing the application.
 *
 * Set the default language by changing the LANGUAGE constant. For a full list of
 * available languages look at the /application/config/config.php file.
 *
 * IMPORTANT:
 * If you are updating from version 1.0 you will have to create a new "config.php"
 * file because the old "configuration.php" is not used anymore.
 */
class Config {

    // ------------------------------------------------------------------------
    // GENERAL SETTINGS
    // ------------------------------------------------------------------------

    const BASE_URL      = 'https://extramus.naijanetsolution.com';
    const LANGUAGE      = 'english';
    const DEBUG_MODE    = FALSE;

    // ------------------------------------------------------------------------
    // DATABASE SETTINGS
    // ------------------------------------------------------------------------

    const DB_HOST       = 'localhost';
    const DB_NAME       = 'gavirpkn_eu';
    const DB_USERNAME   = 'gavirpkn_eu';
    const DB_PASSWORD   = 'gavirpkn_eu';

    // ------------------------------------------------------------------------
    // GOOGLE CALENDAR SYNC
    // ------------------------------------------------------------------------

    const GOOGLE_SYNC_FEATURE   = TRUE; // Enter TRUE or FALSE
    const GOOGLE_PRODUCT_NAME   = 'Extramus Appointment';
    const GOOGLE_CLIENT_ID      = '830639358471-o8vkheinbmnmvkl7aoeojh57am9b1dah.apps.googleusercontent.com';
    const GOOGLE_CLIENT_SECRET  = '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';
    const GOOGLE_API_KEY        = 'AIzaSyBp2bbQLtVrv1Sw-5ntf_WE4rjxJemyr4k';
}

/* End of file config.php */
/* Location: ./config.php */
