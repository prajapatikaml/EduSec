<?php

Yii::import('ext.httpclient.*');
Yii::import('ext.httpclient.adapter.*');

/**
 * EHttpTouchClient.php
 *
 * Send url requests without waiting for response
 * Requirements:
 * Yii extension EHttpClient
 * @link http://www.yiiframework.com/extension/ehttpclient
 *
 * PHP version 5.2+
 *
 * @author Joe Blocher <yii@myticket.at>
 * @copyright 2011 myticket it-solutions gmbh
 * @license New BSD License
 * @package runactions
 * @version 1.1
 */
class EHttpTouchClient extends EHttpClient
{
	/**
	 * Send the HTTP request without reading the result
	 *
	 * @param string $method
	 * @return null
	 * @throws EHttpClientException
	 */
	public function request($method = null)
	{
		if (! $this->uri instanceof EUriHttp) {
			throw new EHttpClientException(
			   Yii::t('EHttpClient','No valid URI has been passed to the client'));
		}

		if ($method) $this->setMethod($method);
		$this->redirectCounter = 0;
		$response = null;

		// Make sure the adapter is loaded

		if ($this->adapter == null) $this->setAdapter($this->config['adapter']);

		// Send the first request. If redirected, continue.
		// Clone the URI and add the additional GET parameters to it
		$uri = clone $this->uri;
		if (! empty($this->paramsGet)) {
			$query = $uri->getQuery();
			if (! empty($query)) $query .= '&';
			$query .= http_build_query($this->paramsGet, null, '&');

			$uri->setQuery($query);
		}

		$body = $this->_prepareBody();
		$headers = $this->_prepareHeaders();

		// Open the connection, send the request and read the response
		$this->adapter->connect($uri->getHost(), $uri->getPort(),
		    ($uri->getScheme() == 'https' ? true : false));

		$this->last_request = $this->adapter->write($this->method,
		    $uri, $this->config['httpversion'], $headers, $body);

		return null;
	}

}
