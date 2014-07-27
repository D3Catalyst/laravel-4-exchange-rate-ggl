<?php
namespace D3catalyst\Exchangerate;

use Illuminate\Support\ServiceProvider;

/**
*  Class ExchangerateServiceProvider.
*
*
*  @author Ricardo Madrigal <soporte@d3catalyst.com>
*/
class ExchangerateServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('d3catalyst/exchangerate');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app["exchangerate"] = $this->app->share(function($app){
		    return new Exchangerate;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
