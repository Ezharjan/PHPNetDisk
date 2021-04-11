<?php
/**
* ROLE PERMISSIONS
**/
?>
<div id="view-permissions" class="anchor"></div>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <i class="fa fa-balance-scale"></i> <?php echo $setUp->getString('permissions'); ?>
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php
                    if (!function_exists('curl_version')) { ?>
                    <div class="col-sm-12">
                        <p class="bg-warning">The Remote Uploader needs the <strong>PHP Curl</strong> extension enabled</p>
                    </div>
                    <?php
                    } else { 
                        $remotechecked = $setUp->getConfig('remote_uploader') ? 'checked' : '';
                    ?>
                    <div class="col-sm-12">
                        <div class="checkbox-big toggle-extensions clear">
                            <label>
                                <input type="checkbox" name="remote_uploader"  class="togglext" <?php echo $remotechecked; ?>>
                                <i class="fa fa-globe fa-lg fa-fw"></i> <?php echo $setUp->getString("remote_upload"); ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo $setUp->getString("allowed_ext"); ?>
                            </label>
                            <?php 
                            $remote_allow_type = $setUp->getConfig('remote_extensions');
                            $remote_allowlist = $remote_allow_type ? implode(",", $remote_allow_type) : false; ?>
                            <input type="text" class="form-control taginput" name="remote_extensions" data-tag="success" 
                            value="<?php echo $remote_allowlist; ?>" placeholder="jpg,gif,pn..">
                        </div>
                    </div>
                    <?php
                    } ?>
                </div>
            <hr>
                <h4>User</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox checkbox-big">
                            <label>
                                <input type="checkbox" name="upload_enable_user" 
                                <?php
                                if ($setUp->getConfig('upload_enable_user')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-file-o fa-stack-2x"></i>
                                      <i class="fa fa-upload fa-stack-1x"></i>
                                    </span>
                                <?php print $setUp->getString("upload_files"); ?>
                            </label>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newdir_enable_user" 
                                <?php
                                if ($setUp->getConfig('newdir_enable_user')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-folder fa-stack-2x"></i>
                                      <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                <?php print $setUp->getString("create_new_folders"); ?>
                            </label>
                        </div>
                    </div>

                </div>
<hr>
                <h4>Admin</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox checkbox-big">
                            <label>
                                <input type="checkbox" name="upload_enable" 
                                <?php
                                if ($setUp->getConfig('upload_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-file-o fa-stack-2x"></i>
                                      <i class="fa fa-upload fa-stack-1x"></i>
                                    </span>
                                <?php print $setUp->getString("upload_files"); ?>
                            </label>
                        </div>

                        <div class="checkbox checkbox-big">
                            <label>
                                <input type="checkbox" name="delete_enable" 
                                <?php
                                if ($setUp->getConfig('delete_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-file-o fa-stack-2x"></i>
                                      <i class="fa fa-trash fa-stack-1x"></i>
                                    </span>
                                <?php print $setUp->getString("delete_files"); ?>
                            </label>
                        </div>

                        <div class="checkbox checkbox-big">
                            <label>
                                <input type="checkbox" name="rename_enable" 
                                <?php
                                if ($setUp->getConfig('rename_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-file-o fa-stack-2x"></i>
                                      <i class="fa fa-pencil-square-o fa-stack-1x"></i>
                                    </span>
                                <?php print $setUp->getString("rename_files"); ?>
                            </label>
                        </div>

                        <div class="checkbox checkbox-big">
                            <label>
                                <input type="checkbox" name="move_enable" 
                                <?php
                                if ($setUp->getConfig('move_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-file-o fa-stack-2x"></i>
                                      <i class="fa fa-arrow-right fa-stack-1x"></i>
                                    </span>
                                <?php print $setUp->getString("move_files"); ?>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="copy_enable" 
                                <?php
                                if ($setUp->getConfig('copy_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-file-o fa-stack-2x"></i>
                                      <i class="fa fa-files-o fa-stack-1x"></i>
                                    </span>
                                <?php print $setUp->getString("copy_files"); ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="newdir_enable" 
                                <?php
                                if ($setUp->getConfig('newdir_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-folder fa-stack-2x"></i>
                                      <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                <?php print $setUp->getString("create_new_folders"); ?>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="delete_dir_enable" 
                                <?php
                                if ($setUp->getConfig('delete_dir_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-folder fa-stack-2x"></i>
                                      <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                                    </span>
                                <?php print $setUp->getString("delete_folders"); ?>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rename_dir_enable" 
                                <?php
                                if ($setUp->getConfig('rename_dir_enable')) {
                                    echo "checked";
                                } ?>> 
                                    <span class="fa-stack">
                                      <i class="fa fa-folder fa-stack-2x"></i>
                                      <i class="fa fa-pencil-square-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                <?php print $setUp->getString("rename_folders"); ?>
                            </label>
                        </div>
                    </div>
                </div>

            <?php
            if (GateKeeper::isMasterAdmin()) { ?>
                <hr>
                <h4>SuperAdmin</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="checkbox checkbox-big">
                                <label>
                                    <input type="checkbox" name="superadmin_can_preferences" 
                                    <?php
                                    if ($setUp->getConfig('superadmin_can_preferences')) {
                                        echo "checked";
                                    } ?>><i class="fa fa-dashboard fa-lg"></i>
                                    <?php print $setUp->getString("preferences"); ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox checkbox-big">
                                <label>
                                    <input type="checkbox" name="superadmin_can_users" 
                                    <?php
                                    if ($setUp->getConfig('superadmin_can_users')) {
                                        echo "checked";
                                    } ?>><i class="fa fa-users fa-lg"></i>
                                    <?php print $setUp->getString("users"); ?>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox checkbox-big">
                                <label>
                                    <input type="checkbox" name="superadmin_can_appearance" 
                                    <?php
                                    if ($setUp->getConfig('superadmin_can_appearance')) {
                                        echo "checked";
                                    } ?>><i class="fa fa-paint-brush fa-lg"></i>
                                    <?php print $setUp->getString("appearance"); ?>
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="checkbox checkbox-big">
                                <label>
                                    <input type="checkbox" name="superadmin_can_translations" 
                                    <?php
                                    if ($setUp->getConfig('superadmin_can_translations')) {
                                        echo "checked";
                                    } ?>><i class="fa fa-language fa-lg"></i>
                                    <?php print $setUp->getString("translations"); ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-big">
                                <label>
                                    <input type="checkbox" name="superadmin_can_statistics" 
                                    <?php
                                    if ($setUp->getConfig('superadmin_can_statistics')) {
                                        echo "checked";
                                    } ?>><i class="fa fa-pie-chart fa-lg"></i>
                                    <?php print $setUp->getString("statistics"); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div> <!-- box-body -->
        </div> <!-- box -->
    </div>
</div>
