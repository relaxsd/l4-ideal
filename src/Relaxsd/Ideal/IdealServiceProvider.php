<?php namespace Relaxsd\Ideal;

use Bs\IDeal\IDeal;
use Illuminate\Support\ServiceProvider;

class IdealServiceProvider extends ServiceProvider
{

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
        $this->package('relaxsd/ideal');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ideal', function () {
            $iDeal = new IDeal(\Config::get('ideal::ideal.base-url'));
            $iDeal->setMerchant(\Config::get('ideal::ideal.merchant-id'));
            $iDeal->setAcquirerCertificate(\Config::get('ideal::ideal.acquirer.certificate'));
            $iDeal->setMerchantPrivateKey(
                \Config::get('ideal::ideal.merchant.private-key'),
                \Config::get('ideal::ideal.merchant.passphrase')
            );
            $iDeal->setMerchantCertificate(\Config::get('ideal::ideal.merchant.certificate'));
            return $iDeal;
        }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ideal'];
    }

}
