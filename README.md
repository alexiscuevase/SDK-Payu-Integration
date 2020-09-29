# SDK-Payu-Integration
## PHP Integration
### Para integrar los SDK de PayU Latam siga los siguientes pasos

**1.** Entre a su panel de [control](https://merchants.payulatam.com/#/login/auth) si no tiene una cuenta en PayU puede registrarse gratis.

**2.** Descargue el [SDK de PayU](http://developers.payulatam.com/es/sdk/)

**3.** incluya el SDK en su proyecto y vinculelo con su archivo principal **(Ejemplo: header.php, index.php, etc)**
```php
<?php
require_once '[ruta/payu-php-sdk]/lib/PayU.php';
...
?>
```

**4.** vaya a **[ruta/payu-php-sdk]/lib/PayU.php** y configure la class PayU
```php
abstract class PayU {
	
	/**
	 * Api version
	 */
	const  API_VERSION = "4.0.1";

	/**
	 * Api name
	 */
	const  API_NAME = "PayU SDK";
	
	
	const API_CODE_NAME = "PAYU_SDK";

	/**
	 * The method invocation is for testing purposes
	 */
	public static $isTest = false;

	/**
	 * The merchant API key
	 */
	public static  $apiKey = null;

	/**
	 * The merchant API Login
	 */
	public static  $apiLogin = null;

	/**
	 * The merchant Id
	 */
	public static  $merchantId = null;

	/**
	 * The request language
	 */
	public static $language = SupportedLanguages::ES;
}
```
