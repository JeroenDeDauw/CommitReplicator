<?php

namespace CommitReplicator\Tests\Integration;

use CommitReplicator\Gerrit\Api\GerritChangesApi;
use FileFetcher\SimpleFileFetcher;

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
		$api = new GerritChangesApi( 'https://gerrit.wikimedia.org', new SimpleFileFetcher() );

//		die($api->query(
//			array(
//				'status' => 'open',
//				'project' => 'mediawiki/extensions/Ask',
//				'-age' => '3w',
//			),
//			array(
//				GerritChangesApi::LIMIT_ARGUMENT => 2,
//				GerritChangesApi::OPTIONS_ARGUMENT => 'CURRENT_REVISION'
//			)
//		));


	}

}
