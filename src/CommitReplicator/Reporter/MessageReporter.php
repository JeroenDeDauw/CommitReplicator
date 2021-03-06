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
interface MessageReporter {

	public function reportMessage( $message );

}