<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Task_ExtensionsUpdatesRefresh extends AutoUpdater_Task_Base
{
    protected $high_priority = false;

    /**
     * @return array
     */
    public function doTask()
    {
        $type = $this->input('type', '');

        switch ($type) {
            case 'plugin':
                wp_update_plugins();
                break;
            case 'theme':
                wp_update_themes();
                break;
        }

        return array(
            'success' => true,
        );
    }
}
