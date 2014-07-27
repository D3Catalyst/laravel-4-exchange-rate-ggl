<?php
namespace D3Catalyst\Exchangerate\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use D3Catalyst\Exchangerate\Exchangerate as Exchangerate;

/**
*  Class ExchangerateServiceProvider.
*
*
*  @author Ricardo Madrigal <soporte@d3catalyst.com>
*/
class ExchangerateServiceProvider extends ServiceProvider {
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('exchangerate', function(){
			return new Exchangerate;
		});
	}

}
