<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Task_ChildUpdate extends AutoUpdater_Task_Base
{
    protected $encrypt = false;

    /**
     * @return array
     */
    public function doTask()
    {
        $data = array('wpe_provider' => $this->input('provider', 'wpengine'));
        $site_id = $this->input('site_id', AutoUpdater_Config::get('site_id'));

        $this->setInput('type', 'plugin');
        $this->setInput('slug', AUTOUPDATER_WP_PLUGIN_SLUG);
        $this->setInput('path', AutoUpdater_Request::getApiUrl('get', 'download/worker.zip', $data, $site_id));

        return AutoUpdater_Task::getInstance('ExtensionUpdate', $this->payload)
            ->doTask();
    }
}
