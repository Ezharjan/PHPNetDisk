<?php
/**
 * Appearance
 *
 * @package    VenoFileManager
 * @subpackage Administration
 */
?>
<div id="view-appearance" class="anchor"></div>
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="box box-default box-solid">
                    <div class="box-header">
                        <i class="fa fa-eyedropper fa-fw"></i> <?php echo $setUp->getString('style'); ?>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label><?php echo $setUp->getString('theme'); ?></label>
                            <select class="form-control skinswitch" name="skin">
                            <?php
                            $skinselected = basename($setUp->getConfig('skin'), '.css');
                            $colorbarselected = $setUp->getConfig('progress_color') ? $setUp->getConfig('progress_color') : $skinselected;

                            $skins = glob('_content/skins/*.css');
                            foreach ($skins as $skin) {
                                $fileskin = basename($skin);
                                $skinname = basename($skin, '.css');
                                ?>
                                <option 
                                <?php
                                if ($setUp->getConfig('skin') == $fileskin) {
                                    echo 'selected ';
                                }
                                ?> 
                                value="<?php echo $fileskin; ?>" data-color="<?php echo $skinname; ?>">
                                    <?php echo $skinname; ?>
                                </option>
                            <?php
                            } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo $setUp->getString("upload_progress"); ?></label>
                            <div class="radio pro">
                                <label>
                                    <input type="radio" name="progressColor" value="" data-color="<?php echo $skinselected; ?>" class="first-progress" 
                                    <?php
                                    if ($colorbarselected == $skinselected) {
                                        echo "checked";
                                    } ?>>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar <?php echo $skinselected; ?>" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <p class="pull-left propercent">45%</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="radio pro">
                                <label>
                                    <input type="radio" name="progressColor" value="progress-bar-info" data-color="progress-bar-info" 
                                    <?php
                                    if ($colorbarselected == "progress-bar-info") {
                                        echo "checked";
                                    } ?>>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            <p class="pull-left propercent">65%</p>
                                        </div>
                                    </div>
                              </label>
                            </div>
                            <div class="radio pro">
                                <label>
                                    <input type="radio" name="progressColor" value="progress-bar-success" data-color="progress-bar-success" 
                                    <?php
                                    if ($colorbarselected == "progress-bar-success") {
                                        echo "checked";
                                    } ?>>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                                            <p class="pull-left propercent">35%</p>
                                        </div>
                                    </div>
                              </label>
                            </div>
                            <div class="radio pro">
                                <label>
                                    <input type="radio" name="progressColor" value="progress-bar-warning" data-color="progress-bar-warning" 
                                    <?php
                                    if ($colorbarselected == "progress-bar-warning") {
                                        echo "checked";
                                    } ?>>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <p class="pull-left propercent">85%</p>
                                        </div>
                                    </div>
                              </label>
                            </div>
                            <div class="radio pro">
                                <label>
                                    <input type="radio" name="progressColor" value="progress-bar-danger" data-color="progress-bar-danger" 
                                    <?php
                                    if ($colorbarselected == "progress-bar-danger") {
                                        echo "checked";
                                    } ?>>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                            <p class="pull-left propercent">75%</p>
                                        </div>
                                    </div>
                              </label>
                            </div>

                            <div class="checkbox clear intero">
                                <label>
                                    <input type="checkbox" name="show_percentage" id="percent" 
                                    <?php
                                    if ($setUp->getConfig('show_percentage')) {
                                            echo "checked";
                                    } ?>>
                                    <?php print $setUp->getString("show_percentage"); ?> %
                                </label>
                            </div>
                            <div class="checkbox pro clear intero">
                                <label>
                                    <input type="checkbox" name="single_progress" id="single-progress" 
                                    <?php
                                    if ($setUp->getConfig('single_progress')) {
                                            echo "checked";
                                    } ?>>
                                    <div class="progress progress-single">
                                        <div class="progress-bar <?php echo $colorbarselected; ?>" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            <p class="pull-left propercent"><?php print $setUp->getString("single_progress"); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div><!-- box-body -->
                </div><!-- box -->

                <?php
                $navbar_logo = $setUp->getConfig('navbar_logo', false) ? '_content/uploads/'.$setUp->getConfig('navbar_logo') : 'admin-panel/images/placeholder.png';
                $deleterclass = $setUp->getConfig('navbar_logo', false) ? '' : ' hidden';
                ?>
                <div class="box box-default box-solid">
                    <div class="box-header">
                        <i class="fa fa-certificate fa-fw"></i> <?php echo $setUp->getString('navbar_logo'); ?>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-8 col-sm-9">
                                <div class="placeheader text-left">
                                    <button class="btn btn-danger btn-xs deletelogo<?php echo $deleterclass;?>" data-setting="navbar_logo">&times;</button>
                                    <img class="navbar_logo-preview" src="<?php echo $navbar_logo; ?>?t=<?php echo time(); ?>">
                                </div>
                                <input type="hidden" name="remove_navbar_logo" value="0">
                            </div>
                            <div class="col-xs-4 col-sm-3">
                                <span class="btn btn-default btn-file btn-block btn-lg">
                                    <i class="fa fa-upload"></i>
                                    <input type="file" name="navbar_logo" value="select" class="logo-selector navbar-logo" data-target=".navbar_logo-preview">
                                </span>
                            </div>
                        </div>
                    </div><!-- box-body -->
                </div><!-- box -->
            </div><!-- col6 -->

            <div class="col-sm-6">
                <div class="box box-default box-solid">
                    <div class="box-header">
                        <i class="fa fa-bell-o fa-fw"></i> <?php echo $setUp->getString('notifications'); ?>
                    </div>
                    <div class="box-body">
                        <div class="row toggle">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sticky_alerts" 
                                        <?php
                                        if ($setUp->getConfig('sticky_alerts')) {
                                            echo "checked";
                                        } ?>><i class="fa fa-sticky-note fa-fw"></i> 
                                        <?php echo $setUp->getString("sticky_alerts"); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row toggled form-group">
                            <div class="col-sm-6">
                                <?php
                                $stickypos = $setUp->getConfig('sticky_alerts_pos') ? $setUp->getConfig('sticky_alerts_pos') : 'top-left';
                                ?>
                                <div class="form-group">
                                    <select class="form-control" name="sticky_alerts_pos_v">
                                        <option 
                                    <?php
                                    if ($stickypos == "top-left" || $stickypos == "top-right") {
                                        echo "selected";
                                    } ?> value="top">top</option>
                                        <option 
                                    <?php
                                    if ($stickypos == "bottom-left" || $stickypos == "bottom-right") {
                                        echo "selected";
                                    } ?> value="bottom">bottom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control" name="sticky_alerts_pos_h">
                                        <option 
                                    <?php
                                    if ($stickypos == "top-left" || $stickypos == "bottom-left") {
                                        echo "selected";
                                    } ?> value="left">left</option>
                                        <option 
                                    <?php
                                    if ($stickypos == "top-right" || $stickypos == "bottom-right") {
                                        echo "selected";
                                    } ?> value="right">right</option>
                                    </select>
                                </div>
                            </div> <!-- col 6 -->
                        </div> <!-- row toggled -->

                        <div class="row">
                            <div class="col-sm-12">
                                <label>
                                    <i class="fa fa-volume-up fa-fw"></i> <?php print $setUp->getString("audio_notification_after_upload"); ?>
                                </label>
                            </div>
                            <div class="col-sm-12">
                                <?php
                                $audiofiles = glob("_content/audio/*.mp3"); ?>
                                <select class="form-control audio-notif" name="audio_notification">
                                    <option value="">---</option>
                                <?php
                                foreach ($audiofiles as $audio) { 
                                    $selectedaudio = ($audio == $setUp->getConfig('audio_notification')) ? 'selected' : ''; ?>
                                    <option value="<?php echo $audio; ?>" <?php echo $selectedaudio; ?>>
                                        <?php echo basename($audio, '.mp3'); ?>
                                    </option>
                                <?php
                                } ?>
                                </select>
                            </div>
                        </div>
                    </div><!-- box-body -->
                </div><!-- box -->

                <div class="box box-default box-solid">
                    <div class="box-header">
                        <i class="fa fa-thumb-tack fa-fw"></i> <?php echo $setUp->getString('site_icon'); ?>
                    </div>

                    <div class="box-body">
                        <label><?php echo $setUp->getString('browser_and_app_icon'); ?></label>
                        <div class="row form-group">
                            <div class="col-xs-6">
                                <div class="placeicon">
                                    <img class="app_ico-preview" src="<?php echo $admin->printImgPlace('_content/uploads/favicon.ico'); ?>?t=<?php echo time(); ?>" style="height: 16px; width: 16px;">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <img class="app_ico-preview img-responsive shaded" src="<?php echo $admin->printImgPlace('_content/uploads/favicon-152.png'); ?>?t=<?php echo time(); ?>" style="height: 76px; width: 76px; border-radius:6px;">
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-xs-12 form-group">
                                <span class="btn btn-default btn-file">
                                    <i class="fa fa-upload"></i>
                                    <input type="file" name="app_ico" value="select" class="logo-selector app-icon" data-target=".app_ico-preview" accept="image/png,image/gif,image/jpg">
                                </span>
                                <?php $deletericoclass = file_exists('_content/uploads/favicon.ico') ? '' : ' hidden'; ?>
                                <button class="btn btn-default deletelogo pos-relative<?php echo $deletericoclass;?>" data-setting="app_ico">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                            <input type="hidden" name="remove_app_ico" value="0">
                        </div>
                    </div><!-- box-body -->
                    <div class="box-footer">
                        Min. 152x152 px (gif, jpg, png)
                    </div>
                </div><!-- box -->

            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
        <?php
        require dirname(__FILE__)."/custom-header.php";
        require dirname(__FILE__)."/footer-credits.php";
        ?>
    </div><!-- col -->
</div> <!-- row -->
