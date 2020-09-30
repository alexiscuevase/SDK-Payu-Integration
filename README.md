# SDK-Payu-Integration
## PHP SDK Integration
### Para integrar los SDK de PayU Latam siga los siguientes pasos

**1.** Entre a su panel de [control](https://merchants.payulatam.com/#/login/auth) de **PayU**, si no tiene una cuenta en **PayU** puede [registrarse](https://merchants.payulatam.com/#/login/auth) gratis.

**2.** [Descargue](http://developers.payulatam.com/es/sdk/) el **SDK de PayU**

**3.** incluya el **SDK** en su proyecto y vinculelo con su archivo principal o donde quiera usar las **SDK de Payu (Ejemplo: index.php, etc)**
```php
<?php
require_once '[ruta/payu-php-sdk]/lib/PayU.php';
...
?>
```

**4.** vaya a **[ruta/payu-php-sdk]/lib/PayU.php** y configure la **class PayU**
```php
abstract class PayU {
	const  API_VERSION = "4.0.1";
	const  API_NAME = "PayU SDK";
	const API_CODE_NAME = "PAYU_SDK";

	public static $isTest = true; # [boolean] si esta en modo prueba coloque true
	public static  $apiKey = "4Vj8eK4rloUd272L48hsrarnUA"; # [string] si el modo prueba es false(en produccion) la apiKey seria la de su panel administrativo 
	public static  $apiLogin = "pRRXKOl8ikMmt9u"; # [string] si el modo prueba es false(en produccion) la apiLogin seria la de su panel administrativo
	public static  $merchantId = 508029; # [string] si el modo prueba es false(en produccion) la merchantId seria la de su panel administrativo
	public static $language = SupportedLanguages::ES; # Idioma
}
```
**5.** en **[ruta/payu-php-sdk]/lib/PayU.php** baje y configure la ultima linea con el siguiente codigo
```php
Environment::validate();
# configure lo siguiente si el modo prueba($isTest) es true configure lo siguiente {
Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.9/");
# } si el modo prueba es false configure lo siguiente{
Environment::setPaymentsCustomUrl("https://api.payulatam.com/payments-api/4.0/service.cgi");
Environment::setReportsCustomUrl("https://api.payulatam.com/reports-api/4.0/service.cgi");
Environment::setSubscriptionsCustomUrl("https://api.payulatam.com/payments-api/rest/v4.9/");
# }
```
## Pagos
### Tarjetas de crédito
Asi se estaria viendo su archivo principal (**index.php**), Puede modificarlo enviado un post para cada campo.

la **$value** es el precio 

la **$reference** esta debe ser unica ya que con esa se identificara la transaccion 

```html
<form method="post" action="">
	<input type="submit" name="card" value="Enviar">
</form>
```
```php
<?php 
require_once './lib/PayU.php';
$reference = time();
$value = 20000;

if (isset($_POST['card'])) {
	$parameters = array(
		//Ingrese aquí el identificador de la cuenta.
		PayUParameters::ACCOUNT_ID => "512321",
		//Ingrese aquí el código de referencia.
		PayUParameters::REFERENCE_CODE => $reference,
		//Ingrese aquí la descripción.
		PayUParameters::DESCRIPTION => "payment test",

	    // -- Valores --
	    //Ingrese aquí el valor de la transacción.
	    PayUParameters::VALUE => $value,
	    //Ingrese aquí el valor del IVA (Impuesto al Valor Agregado solo valido para Colombia) de la transacción,
	    //si se envía el IVA nulo el sistema aplicará el 19% automáticamente. Puede contener dos dígitos decimales.
	    //Ej: 19000.00. En caso de no tener IVA debe enviarse en 0.
	    PayUParameters::TAX_VALUE => "3193",
	    //Ingrese aquí el valor base sobre el cual se calcula el IVA (solo valido para Colombia).
	    //En caso de que no tenga IVA debe enviarse en 0.
	    PayUParameters::TAX_RETURN_BASE => "16806",
		//Ingrese aquí la moneda.
		PayUParameters::CURRENCY => "COP",

		// -- Comprador
		//Ingrese aquí el nombre del comprador.
		PayUParameters::BUYER_NAME => "First name and second buyer name",
		//Ingrese aquí el email del comprador.
		PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
		//Ingrese aquí el teléfono de contacto del comprador.
		PayUParameters::BUYER_CONTACT_PHONE => "7563126",
		//Ingrese aquí el documento de contacto del comprador.
		PayUParameters::BUYER_DNI => "5415668464654",
		//Ingrese aquí la dirección del comprador.
		PayUParameters::BUYER_STREET => "calle 100",
		PayUParameters::BUYER_STREET_2 => "5555487",
		PayUParameters::BUYER_CITY => "Medellin",
		PayUParameters::BUYER_STATE => "Antioquia",
		PayUParameters::BUYER_COUNTRY => "CO",
		PayUParameters::BUYER_POSTAL_CODE => "000000",
		PayUParameters::BUYER_PHONE => "7563126",

		// -- pagador --
		//Ingrese aquí el nombre del pagador.
		PayUParameters::PAYER_NAME => "First name and second payer name",
		//Ingrese aquí el email del pagador.
		PayUParameters::PAYER_EMAIL => "payer_test@test.com",
		//Ingrese aquí el teléfono de contacto del pagador.
		PayUParameters::PAYER_CONTACT_PHONE => "7563126",
		//Ingrese aquí el documento de contacto del pagador.
		PayUParameters::PAYER_DNI => "5415668464654",
		//Ingrese aquí la dirección del pagador.
		PayUParameters::PAYER_STREET => "calle 93",
		PayUParameters::PAYER_STREET_2 => "125544",
		PayUParameters::PAYER_CITY => "Bogota",
		PayUParameters::PAYER_STATE => "Bogota",
		PayUParameters::PAYER_COUNTRY => "CO",
		PayUParameters::PAYER_POSTAL_CODE => "000000",
		PayUParameters::PAYER_PHONE => "7563126",

		// -- Datos de la tarjeta de crédito --
		//Ingrese aquí el número de la tarjeta de crédito
		PayUParameters::CREDIT_CARD_NUMBER => "4097440000000004",
		//Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
		PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2021/01",
		//Ingrese aquí el código de seguridad de la tarjeta de crédito
		PayUParameters::CREDIT_CARD_SECURITY_CODE=> "321",
		//Ingrese aquí el nombre de la tarjeta de crédito
		//VISA||MASTERCARD||AMEX||DINERS
		PayUParameters::PAYMENT_METHOD => "VISA",

		//Ingrese aquí el número de cuotas.
		PayUParameters::INSTALLMENTS_NUMBER => "1",
		//Ingrese aquí el nombre del pais.
		PayUParameters::COUNTRY => PayUCountries::CO,

		//Session id del device.
		PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
		//IP del pagadador
		PayUParameters::IP_ADDRESS => "127.0.0.1",
		//Cookie de la sesión actual.
		PayUParameters::PAYER_COOKIE=>"pt1t38347bs6jc9ruv2ecpv7o2",
		//Cookie de la sesión actual.
		PayUParameters::USER_AGENT=>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
	);

	$response = PayUPayments::doAuthorizationAndCapture($parameters);
	echo "<pre>";
	print_r($response);
	echo "</pre>";

	if ($response) {
		# si la respuesta se dio usted puede ejecutar aqui un codigo o insertar los valores a su base de datos
		# si quiere acceder a un valor especifico de la respuesta use ->
		$code = $response->code;
		$state = $response->transactionResponse->state;
		echo "codigo: ".$code."<br>";
		echo "estado de transacción: ".$state."<br>";
	}
}

?>
```
consiga mas informacion sobre los [SDK-PAYU](http://developers.payulatam.com/es/sdk/payments.html)
