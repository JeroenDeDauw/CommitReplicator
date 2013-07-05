<?php

namespace CommitReplicator\Gerrit\Api;

use FileFetcher\FileFetcher;

/**
 * @since 0.1
 *
 * @file
 * @ingroup CommitReplicator
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class GerritChangesApi {

	const QUERY_ARGUMENT = 'q';
	const LIMIT_ARGUMENT = 'n';
	const OPTIONS_ARGUMENT = 'o';

	/**
	 * For instance https://gerrit.wikimedia.org
	 *
	 * @var string
	 */
	protected $apiUrl;

	/**
	 * @var FileFetcher
	 */
	protected $fileFetcher;

	public function __construct( $apiUrl, FileFetcher $fileFetcher ) {
		$this->apiUrl = $apiUrl;
		$this->fileFetcher = $fileFetcher;
	}

	public function query( array $queryArguments, array $furtherOptions = array() ) {
		$requestArguments = array_merge(
			array( self::QUERY_ARGUMENT => $this->implodeArguments( $queryArguments, ':', '+' ) ),
			$furtherOptions
		);

		$requestUrl = $this->buildUrl(
			$this->apiUrl . '/r/changes/',
			$requestArguments
		);

		return $this->fileFetcher->fetchFile( $requestUrl );
	}

	protected function buildUrl( $urlBase, array $arguments ) {
		if ( $arguments === array() ) {
			return $urlBase;
		}

		return $urlBase . '?' . $this->implodeArguments( $arguments, '=', '&' );
	}

	protected function implodeArguments( array $arguments, $assignmentOperator, $argumentSeparator ) {
		$assignments = array();

		foreach ( $arguments as $key => $value ) {
			$assignments[] = $key . $assignmentOperator . $value;
		}

		return implode( $argumentSeparator, $assignments );
	}

}

