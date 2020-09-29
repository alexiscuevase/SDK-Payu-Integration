<?php

require_once dirname(__FILE__).'/PayU/api/SupportedLanguages.php';
require_once dirname(__FILE__).'/PayU/api/PayUKeyMapName.php';
require_once dirname(__FILE__).'/PayU/api/PayUCommands.php';
require_once dirname(__FILE__).'/PayU/api/PayUTransactionResponseCode.php';
require_once dirname(__FILE__).'/PayU/api/PayUHttpRequestInfo.php';
require_once dirname(__FILE__).'/PayU/api/PayUResponseCode.php';
require_once dirname(__FILE__).'/PayU/api/PayuPaymentMethodType.php';
require_once dirname(__FILE__).'/PayU/api/PaymentMethods.php';
require_once dirname(__FILE__).'/PayU/api/PayUCountries.php';
require_once dirname(__FILE__).'/PayU/exceptions/PayUErrorCodes.php';
require_once dirname(__FILE__).'/PayU/exceptions/PayUException.php';
require_once dirname(__FILE__).'/PayU/exceptions/ConnectionException.php';
require_once dirname(__FILE__).'/PayU/api/PayUConfig.php';
require_once dirname(__FILE__).'/PayU/api/RequestMethod.php';
require_once dirname(__FILE__).'/PayU/util/SignatureUtil.php';
require_once dirname(__FILE__).'/PayU/api/PaymentMethods.php';
require_once dirname(__FILE__).'/PayU/api/TransactionType.php';
require_once dirname(__FILE__).'/PayU/util/PayURequestObjectUtil.php';
require_once dirname(__FILE__).'/PayU/util/PayUParameters.php';
require_once dirname(__FILE__).'/PayU/util/CommonRequestUtil.php';
require_once dirname(__FILE__).'/PayU/util/RequestPaymentsUtil.php';
require_once dirname(__FILE__).'/PayU/util/UrlResolver.php';
require_once dirname(__FILE__).'/PayU/util/PayUReportsRequestUtil.php';
require_once dirname(__FILE__).'/PayU/util/PayUTokensRequestUtil.php';
require_once dirname(__FILE__).'/PayU/util/PayUSubscriptionsRequestUtil.php';
require_once dirname(__FILE__).'/PayU/util/PayUSubscriptionsUrlResolver.php';
require_once dirname(__FILE__).'/PayU/util/HttpClientUtil.php';
require_once dirname(__FILE__).'/PayU/util/PayUApiServiceUtil.php';

require_once dirname(__FILE__).'/PayU/api/Environment.php';

require_once dirname(__FILE__).'/PayU/PayUBankAccounts.php';
require_once dirname(__FILE__).'/PayU/PayUPayments.php';
require_once dirname(__FILE__).'/PayU/PayUReports.php';
require_once dirname(__FILE__).'/PayU/PayUTokens.php';
require_once dirname(__FILE__).'/PayU/PayUSubscriptions.php';
require_once dirname(__FILE__).'/PayU/PayUCustomers.php';
require_once dirname(__FILE__).'/PayU/PayUSubscriptionPlans.php';
require_once dirname(__FILE__).'/PayU/PayUCreditCards.php';
require_once dirname(__FILE__).'/PayU/PayURecurringBill.php';
require_once dirname(__FILE__).'/PayU/PayURecurringBillItem.php';







/**
 *
 * Holds basic request information
 * 
 * @author PayU Latam
 * @since 1.0.0
 * @version 1.0.0, 20/10/2013
 *
 */
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

Environment::validate();
# configure lo siguiente si el modo prueba($isTest) es true configure lo siguiente {
Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.9/");
# } si el modo prueba es false configure lo siguiente{
/*
Environment::setPaymentsCustomUrl("https://api.payulatam.com/payments-api/4.0/service.cgi");
Environment::setReportsCustomUrl("https://api.payulatam.com/reports-api/4.0/service.cgi");
Environment::setSubscriptionsCustomUrl("https://api.payulatam.com/payments-api/rest/v4.9/");
*/
# }