# Flowdock for Rocketeer

Sends a basic deployment message to an Flowdock.

To setup add this to your `composer.json` and update :

```json
"nano/rocketeer-flowdock": "dev-master"
```

Then you'll need to set it up, so do `artisan config:publish nano/rocketeer-flowdock` and complete the configuration in `app/packages/nano/rocketeer-flowdock/config.php`.

Once that's done add the following to your providers array in `app/config/app.php` :

```php
'Rocketeer\Plugins\Flowdock\RocketeerHipchatServiceProvider',
```

And that's pretty much it.

Hope it works :) 

