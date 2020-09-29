<?php
defined('AUTOUPDATER_LIB') or die;

class AutoUpdater_Command_Run extends AutoUpdater_Command_Base
{
    /**
     * Checks the connection and reloads the list of plugins, or runs the plugins update process
     *
     * Action type of 'extensions' reloads the list of plugins visible by the AutoUpdater service and checks the connection. It does not send an email notification.
     * Action type of 'update' runs the AutoUpdater service to update plugins. It sends an email notification.
     * To check the status of the process run: wp autoupdater status
     *
     * ## OPTIONS
     *
     * <action_type>
     * : Specify the type of action.
     * ---
     * default: extensions
     * options:
     *   - extensions
     *   - update
     *
     * [--output=<format>]
     * : Output format.
     * ---
     * default: yaml
     * options:
     *   - json
     *   - yaml
     *
     * @when before_wp_load
     */
    public function __invoke($args, $assoc_args)
    {
        if (empty($args)) {
            $args[0] = 'extensions';
        }

        if ($args[0] === 'extensions') {
            $this->run('extensions', $assoc_args);
            return;
        }

        if ($args[0] === 'update') {
            $this->run('update', $assoc_args);
            return;
        }
    }

    /**
     * @param array $assoc_args
     */
    protected function run($action_type, $assoc_args)
    {
        WP_CLI::line(sprintf('Scheduling %s action ...', $action_type));

        $response = AutoUpdater_Request::api('post', 'actions', array(
            'action_type' => $action_type
        ));

        if ($response->code === 409) {
            WP_CLI::error('Another action for this website is running at the moment. Try again later or check its status by running: wp autoupdater status');
        }

        if ($response->code !== 202) {
            WP_CLI::error(sprintf('API request failed with %d HTTP code.', $response->code));
        }

        WP_CLI::line(sprintf('The %s action with ID %d has been scheduled. Check its status by running: wp autoupdater status', $action_type, $response->body->action_id));

        if ($assoc_args['output'] === 'json') {
            WP_CLI::line(json_encode(
                $response->body,
                JSON_PRETTY_PRINT // phpcs:ignore PHPCompatibility.Constants.NewConstants
            ));
            return;
        }

        if ($assoc_args['output'] === 'yaml') {
            WP_CLI\Utils\format_items('yaml', array($response->body), array(
                'action_id',
                'bulk_id',
                'type',
            ));
            return;
        }
    }

    public static function beforeInvoke()
    {
        if (!AutoUpdater_Config::get('site_id')) {
            WP_CLI::error('The site ID is missing.');
        }
        if (!AutoUpdater_Config::get('worker_token')) {
            WP_CLI::error('The worker token is missing.');
        }
    }
}
