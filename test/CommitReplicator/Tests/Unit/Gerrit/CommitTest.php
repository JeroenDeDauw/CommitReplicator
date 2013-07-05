<?php

namespace CommitReplicator\Tests\Unit;

use CommitReplicator\Gerrit\Commit;

/**
 * @covers CommitReplicator\Commit
 *
 * @file
 * @ingroup CommitReplicator
 * @group CommitReplicator
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class CommitTest extends \PHPUnit_Framework_TestCase {

	public function testCanConstruct() {
		new Commit();
		$this->assertTrue( true );
	}

}
