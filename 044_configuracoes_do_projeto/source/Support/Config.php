<?php
/**
 * DATABASE CONFIG
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "fsphp");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "http://localhost/fsphp");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

/**
 * DATEs
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * SESSION
 */
define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions");

/**
 * MESSAGE
 */ 
define("CONF_MESSAGE_CLASS","alert");
define("CONF_MESSAGE_INFO","alert-info");
define("CONF_MESSAGE_SUCCESS","alert-success");
define("CONF_MESSAGE_WARNING","alert-warning");
define("CONF_MESSAGE_ERROR","alert-danger");
define("CONF_MESSAGE_PRIMARY","alert-primary");