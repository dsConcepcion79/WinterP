<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Task_ExtensionsUpdatesRefresh extends AutoUpdater_Task_Base
{
    protected $admin_privileges = true;
    protected $high_priority = false;

    /**
     * @return array
     */
    public function doTask()
    {
        $type = $this->input('type', '');

        // get updates for exceptional extensions (it must be called here)
        AutoUpdater_Loader::loadClass('Helper_Extension');
        AutoUpdater_Helper_Extension::loadMasterSliderPro();

        do_action('load-update-core.php');

        switch ($type) {
            case 'plugin':
                wp_update_plugins();
                break;
            case 'theme':
                wp_update_themes();
                break;
            default:
                wp_update_plugins();
                wp_update_themes();
        }

        return array(
            'success' => true,
            'message' => 'Updates refreshed successfully',
        );
    }
}
