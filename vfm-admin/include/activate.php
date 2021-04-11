<?php
/**
 * VFM - veno file manager: include/activate.php
 * Activate new pending user
 *
 * PHP version >= 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <support@veno.it>
 * @copyright 2013 Nicola Franchini
 * @license   Exclusively sold on CodeCanyon
 * @link      http://filemanager.veno.it/
 */
if (!defined('VFM_APP')) {
    return;
}
$regactive = filter_input(INPUT_GET, "act", FILTER_SANITIZE_STRING);
if ($regactive && $setUp->getConfig("registration_enable") == true) :

    if (file_exists('vfm-admin/users/users-new.php')) {
        include 'vfm-admin/users/users-new.php';

        global $users;
        global $newusers;
        
        $registration_lifetime = $setUp->getConfig('registration_lifetime', '-1 day');
        $lifetime = date("Y-m-d-H-i-s", strtotime($registration_lifetime));

        $newusers = $updater->removeOldReg($newusers, 'date', $lifetime);
        $newuser = $updater->findUserKey($regactive);

        if ($newuser !== false) {
            $username = $newuser['name'];
            $usermail = $newuser['email'];

            if ($updater->findUser($username) === false && $updater->findUser($usermail, true) === false) {
                array_push($users, $newuser);
                $updater->updateUserFile('new');
            } else {
                Utils::setError('<strong>'.$username.'</strong> '.$setUp->getString('file_exists'));
            }

            // Clean current confirmed user.
            $newusers = $updater->removeUserFromValue($newusers, 'name', $username);
            $newusers = $updater->removeUserFromValue($newusers, 'email', $usermail);

            if ($updater->updateRegistrationFile($newusers, 'vfm-admin/users/')) {
                Utils::setSuccess($setUp->getString("registration_completed"));
            } else {
                Utils::setWarning('failed updating registration file');
            }
        } else {
            Utils::setError($setUp->getString('link_expired'));
        }
    }
endif;
