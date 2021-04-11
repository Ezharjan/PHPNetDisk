<?php
/**
 * VFM - veno file manager administration login
 *
 * PHP version >= 5.3
 *
 * @category  PHP
 * @package   VenoFileManager
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2013 Nicola Franchini
 * @license   Regular License http://codecanyon.net/licenses/regular
 * @link      http://filemanager.veno.it/
 */
define('VFM_APP', true);

if (!file_exists('config.php')) {
    if (!copy('config-master.php', 'config.php')) {
        exit("failed to create the main config.php file, check CHMOD on /vfm-admin/");
    }
}
require_once 'config.php';

if ($_CONFIG['debug_mode'] === true) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ALL ^ E_NOTICE);
}
require_once 'users/users.php';
require_once 'users/remember.php';

require_once 'class/class.utils.php';
require_once 'class/class.setup.php';
require_once 'class/class.gatekeeper.php';
require_once 'class/class.admin.php';
require_once 'class/class.template.php';
require_once 'class/class.location.php';

$location = new Location('../');
$setUp = new setUp();
require_once 'translations/'.$setUp->lang.'.php';

$firstrun = SetUp::getConfig('firstrun');
$script_url = SetUp::getConfig('script_url');

$resetconfig = false;
$resetusr = false;

/**
* Get the base url of the app
*/
if ($firstrun || !$script_url) {
    $actual_link = Admin::getAppUrl();
    $_CONFIG['script_url'] = $actual_link;
    $_CONFIG['firstrun'] = false;
    $resetconfig = true;
}
/**
* Create session name
*/
if (strlen($_CONFIG['session_name']) < 5) {
    $session = "vfm_".strval(mt_rand());
    $_CONFIG['session_name'] = $session;
    $resetconfig = true;
}
/**
* Create unique app key
*/
if (strlen($_CONFIG['salt']) < 5) {
    $_CONFIG['salt'] = md5(mt_rand());
    $resetusr = true;
}

/**
* Reset first SuperAdmin
*/
if (strlen($_USERS[0]['pass']) < 1 || $resetusr === true) {
    $reset = crypt($_CONFIG['salt'].urlencode('password'), Utils::randomString());
    $_USERS[0]['pass'] = $reset;
    $usr = '$_USERS = ';
    if (false == (file_put_contents(
        'users/users.php', "<?php\n\n $usr".var_export($_USERS, true).";\n"
    ))
    ) {
        Utils::setError("Error writing on <strong>/users/users.php</strong>, check CHMOD settings");
    }
}

/**
* Update config.php file
*/
if ($resetusr === true || $resetconfig === true) {
    $con = '$_CONFIG = ';
    if (false == (file_put_contents(
        'config.php', "<?php\n\n $con".var_export($_CONFIG, true).";\n"
    ))
    ) {
        Utils::setError("Error writing on <strong>/config.php</strong>, check CHMOD settings");
    }
}

$gateKeeper = new GateKeeper();
$gateKeeper->init('', '_admin');

if (isset($_SESSION['vfm_logged_in']) && $_SESSION['vfm_logged_in'] === 1 && !$gateKeeper->isSuperAdmin()) {
    Utils::setError($setUp->getString('access_denied'));
}

if ($gateKeeper->isSuperAdmin()) {
    header('Location:index.php');
    exit;
} ?>
<!doctype html>
<html lang="<?php echo $setUp->lang; ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo $setUp->printIcon("_content/uploads/"); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | <?php print $setUp->getConfig('appname'); ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<?php 
if ($setUp->getConfig("txt_direction") == "RTL") { ?>
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <?php 
} ?>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vfm-style.css">
    <link rel="stylesheet" href="_content/skins/<?php print $setUp->getConfig('skin'); ?>">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5.js" type="text/javascript"></script>
    <script src="js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body>
<?php
    $template = new Template();
    $template->getPart('navbar', '');
    $template->getPart('header', '');
?>
<div class="container">
    <section class="vfmblock main-content">
        <div class="login">
            <?php echo $setUp->printAlert(); ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-cogs"></i> 
                    <?php print $setUp->getString('administration'); ?>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" 
                    method="post" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label class="sr-only" for="user_name">
                                <?php print $setUp->getString('username'); ?>
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" name="user_name" 
                                value="" class="form-control ricevi1" 
                                placeholder="<?php echo $setUp->getString('username'); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="user_pass">
                                <?php print $setUp->getString('password'); ?>
                            </label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                                <input type="password" name="user_pass" 
                                class="form-control ricevi2" 
                                placeholder="<?php print $setUp->getString('password'); ?>" />
                            </div>
                        </div>
                        <?php 
                        /* ************************ CAPTCHA ************************* */
                        if ($setUp->getConfig('show_captcha_admin') == true ) { 
                            $capath = '';
                            include 'include/captcha.php'; 
                        }   ?>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" />
                                <i class="fa fa-sign-in"></i> 
                                <?php print $setUp->getString('log_in'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <p><a href="../"><i class="fa fa-home"></i> 
                <?php print $setUp->getConfig('appname'); ?></a>
            </p>
        </div> <!-- login -->
    </section>
</div> <!-- container -->

    <?php $template->getPart('footer', ''); ?>
    
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>