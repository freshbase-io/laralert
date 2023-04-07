# Laralert

## Installation

Install with Composer by entering the following command:

```bash
composer require --dev freshbase-io/laralert
```

Add the following in the scripts section of your composer.json file to automatically submit your Composer files after
you have updated your packages:

```js
"scripts": {
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "@php artisan laralert:update",
    ]
},
```

Set the ID of your project in your .env configuration file:
```bash
LARALERT_ID=YOUR-PROJECT-ID
```
