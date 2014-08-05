<?php

namespace Bazo\Pushalot\Client;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;



/**
 * @author Martin Bažík <martin@bazo.sk>
 */
class PushalotClient extends Client
{

	/** @var string */
	private $authorizationToken;


	/**
	 * @param string $authorizationToken
	 */
	public function __construct($authorizationToken)
	{
		$default = array(
			'base_url'	 => '{scheme}://pushalot.com/api/',
			'scheme'	 => 'https',
		);
		$required = ['base_url', 'scheme'];
		$config = Collection::fromConfig([], $default, $required);
		parent::__construct($config->get('base_url'), $config);
		$this->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'client.json'));

		$this->authorizationToken = $authorizationToken;
	}


	/**
	 * @param type $authorizationToken
	 * @return type
	 */
	public function setAuthorizationToken($authorizationToken)
	{
		$this->authorizationToken = $authorizationToken;
		return $this;
	}


	/**
	 *
	 * @param string $body
	 * @param string $title
	 * @param string $linkTitle
	 * @param string $link
	 * @param bool $isImportant
	 * @param bool $isSilent
	 * @param string $image
	 * @param string $source
	 * @return array
	 */
	public function sendMessage($body, $title = NULL, $linkTitle = NULL, $link = NULL, $isImportant = FALSE, $isSilent = FALSE, $image = NULL, $source = NULL)
	{
		$data = [
			'AuthorizationToken' => $this->authorizationToken,
			'Body'				 => $body,
			'Title'				 => $title,
			'Link'				 => $link,
			'LinkTitle'			 => $linkTitle,
			'isImportant'		 => $isImportant,
			'isSilent'			 => $isSilent,
			'Image'				 => $image,
			'Source'			 => $source
		];

		$data = array_filter($data, function($value) {
			if (is_null($value)) {
				return FALSE;
			}
			return TRUE;
		});

		$command = $this->getCommand('sendMessage', $data);

		return $this->execute($command);
	}


}
