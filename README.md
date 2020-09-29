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
	const  API_VERSION = "4.0.1";
	const  API_NAME = "PayU SDK";
	const API_CODE_NAME = "PAYU_SDK";

	public static $isTest = true; #[boolean] si esta en modo prueba coloque true
	public static  $apiKey = "4Vj8eK4rloUd272L48hsrarnUA"; #[string] si el modo prueba es false(en produccion) la apiKey seria la de su panel administrativo 
	public static  $apiLogin = "pRRXKOl8ikMmt9u"; #[string] si el modo prueba es false(en produccion) la apiLogin seria la de su panel administrativo
	public static  $merchantId = 508029; #[string] si el modo prueba es false(en produccion) la merchantId seria la de su panel administrativo
	public static $language = SupportedLanguages::ES; #Idioma
}
```
