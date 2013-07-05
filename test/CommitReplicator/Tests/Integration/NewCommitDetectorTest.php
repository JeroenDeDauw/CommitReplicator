<?php

namespace CommitReplicator\Tests\Integration;

/**
 * @file
 * @ingroup CommitReplicator
 * @group CommitReplicator
 * @group medium
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class NewCommitDetectorTest extends \PHPUnit_Framework_TestCase {

	public function testGetNewCommits() {
		$this->assertTrue( true ); // TODO
		$this->getRecentCommits();
	}

	protected function getRecentCommits() {
		die($this->httpGet($this->buildUrl(
			'https://gerrit.wikimedia.org/r/changes/',
			array(
				'q' => 'status:open+project:mediawiki/extensions/Ask+-age:3w',
				'n' => 2,
				'o' => 'CURRENT_REVISION'
			)
		)));
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

class GerritChangesApi {

	public function __construct() {

	}

}

interface FileFetcher {



}