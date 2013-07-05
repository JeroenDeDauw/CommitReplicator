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
		//die(file_get_contents( 'https://gerrit.wikimedia.org/r/changes/?q=status:open+project:mediawiki/extensions/Ask+-age:3w&n=3&o=CURRENT_REVISION' ));
	}

}
