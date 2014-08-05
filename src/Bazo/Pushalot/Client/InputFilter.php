<?php

namespace Bazo\Pushalot\Client;

/**
 * @author Martin Bažík <martin@bazo.sk>
 */
class InputFilter
{

	const AUTHORIZATION_TOKEN_LENGTH = 32;
	const TITLE_MAX_LENGTH = 250;
	const BODY_MAX_LENGTH = 32768;
	const LINK_TITLE_MAX_LENGTH = 100;
	const LINK_MAX_LENGTH = 1000;
	const IMAGE_URL_MAX_LENGTH = 250;
	const SOURCE_MAX_LENGTH = 25;


	public static function validateAuthorizationToken($input)
	{
		$count = strlen($input);
		if ($count !== self::AUTHORIZATION_TOKEN_LENGTH) {
			throw new ValidationException(sprintf('Authorization token must be %d characters long, only %d given.', self::AUTHORIZATION_TOKEN_LENGTH, $count));
		}

		return $input;
	}


	public static function validateTitle($input)
	{
		$count = strlen($input);
		if ($count > self::TITLE_MAX_LENGTH) {
			throw new ValidationException(sprintf('Title must be less than %d characters long.', self::TITLE_MAX_LENGTH));
		}

		return $input;
	}


	public static function validateBody($input)
	{
		$count = strlen($input);
		if ($count > self::BODY_MAX_LENGTH) {
			throw new ValidationException(sprintf('Body must be less than %d characters long.', self::BODY_MAX_LENGTH));
		}

		return $input;
	}


	public static function validateLinkTitle($input)
	{
		$count = strlen($input);
		if ($count > self::LINK_TITLE_MAX_LENGTH) {
			throw new ValidationException(sprintf('Link title must be less than %d characters long.', self::LINK_TITLE_MAX_LENGTH));
		}

		return $input;
	}


	public static function validateLink($input)
	{
		$count = strlen($input);
		if ($count > self::LINK_MAX_LENGTH) {
			throw new ValidationException(sprintf('Link must be less than %d characters long.', self::LINK_MAX_LENGTH));
		}

		return $input;
	}


	public static function validateImageUrl($input)
	{
		$count = strlen($input);
		if ($count > self::IMAGE_URL_MAX_LENGTH) {
			throw new ValidationException(sprintf('Image URL must be less than %d characters long.', self::IMAGE_URL_MAX_LENGTH));
		}

		return $input;
	}


	public static function validateSource($input)
	{
		$count = strlen($input);
		if ($count > self::SOURCE_MAX_LENGTH) {
			throw new ValidationException(sprintf('Source must be less than %d characters long.', self::SOURCE_MAX_LENGTH));
		}

		return $input;
	}
	
	public static function convertBooleanToString($boolean)
	{
		return $boolean === TRUE ? 'true' : 'false';
	}


}

