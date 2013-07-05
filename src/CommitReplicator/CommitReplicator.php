<?php

namespace CommitReplicator;

use CommitReplicator\Reporter\MessageReporter;
use GitWrapper\GitWrapper;

/**
 * @since 0.1
 *
 * @file
 * @ingroup CommitReplicator
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class CommitReplicator {

	protected $reporter;

	public function __construct( MessageReporter $reporter ) {
		$this->reporter = $reporter;
	}

	public function run() {
		$commitHashes = $this->getNewCommits();

		if ( !empty( $commitHashes ) ) {
			$this->replicateLatestMaster();

			foreach ( $commitHashes as $commitHash ) {
				$this->replicateCommit( $commitHash );
			}
		}
	}

	protected function getNewCommits() {
		return array(); // TODO
	}

	public function replicateLatestMaster() {

	}

	protected function fetchCommit( $commitHash ) {

	}

	protected function replicateCommit( $commitHash ) {

	}


	protected function report( $message ) {
		$this->reporter->reportMessage( $message );
	}

}