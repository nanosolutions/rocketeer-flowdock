<?php
namespace Rocketeer\Plugins\Flowdock;

use Illuminate\Support\ServiceProvider;
use Rocketeer\Facades\Rocketeer;

/**
 * Register the Flowdock plugin with the Laravel framework and Rocketeer
 */
class RocketeerFlowdockServiceProvider extends ServiceProvider
{
	/**
	 * Register classes
	 *
	 * @return void
	 */
	public function register()
	{
		$serviceProvider = $this->app->make('Flowdock\Support\ServiceProvider', [$this->app]);
		$serviceProvider->register();

		$this->app->bind(
			'Rocketeer\Plugins\Hipchat\RocketeerHipchat',
			function () {
				// Create a hipchat notifier.
				$hipchat = $this->app['hipchat'];

				// Get some config.
				$config = $this->app['config'];
				$room = $config->get('rocketeer-hipchat::room');
				$color = $config->get('rocketeer-hipchat::color');
				$messages = $config->get('rocketeer-hipchat::messages');

				// Create the plugin.
				return new RocketeerFlowdock($hipchat, $room, $color, $messages);
			}
		);
	}

	/**
	 * Boot the plugin
	 *
	 * @return void
	 */
	public function boot()
	{
		$config = $this->app['config'];
		$package = 'rocketeers/rocketeer-hipchat';

		$config->package($package,
			base_path() . '/vendor/'. $package .'/src/config'
		);

		if ($this->app['config']->get('rocketeer-hipchat::enabled')) {
			$this->app['rocketeer.tasks']->plugin('Rocketeer\Plugins\Hipchat\RocketeerHipchat');
		}
	}
}
