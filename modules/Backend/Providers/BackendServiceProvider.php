<?php namespace Modules\Backend\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App;
class BackendServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		//
        $this->registerSingletons();
	}

    protected function registerSingletons()
    {
        $this->registerAuthenticator();

        App::singleton('backend.helper', function( $app ) {
            return new \Modules\Backend\Helpers\Backend();
        });
        App::singleton('backend.navigation', function( $app ) {
            return new \Modules\Backend\Classes\NavigationManager();
        });
    }

    protected function registerAuthenticator()
    {
        App::singleton('backend.auth', function( $app ) {
            return new \Modules\Backend\Classes\Auth\Manager( $app );
        });
    }
	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('backend.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'backend'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/backend');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/backend';
		}, \Config::get('view.paths')), [$sourcePath]), 'backend');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/backend');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'backend');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'backend');
		}
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
