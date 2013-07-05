<?php

namespace CommitReplicator\Tests\Integration;

use CommitReplicator\CommitReplicator;
use CommitReplicator\Reporter\EchoReporter;

/**
 * @covers CommitReplicator\CommitReplicator
 *
 * @file
 * @ingroup CommitReplicator
 * @group CommitReplicator
 * @group medium
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class CommitReplicatorTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {
		$replicator = new CommitReplicator( new EchoReporter() );

		$replicator->replicateLatestMaster();

		$this->assertTrue( true );
	}

}
