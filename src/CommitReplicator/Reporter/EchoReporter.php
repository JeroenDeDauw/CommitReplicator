<?php

namespace CommitReplicator\Reporter;

/**
 * @since 0.1
 *
 * @file
 * @ingroup CommitReplicator
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class EchoReporter implements MessageReporter {

	public function reportMessage( $message ) {
		echo $message;
	}

}