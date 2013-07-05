<?php

/**
 * Test class autoloader for the CommitReplicator library.
 *
 * @since 0.1
 *
 * @file
 * @ingroup CommitReplicator
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

// Ensure the dependencies have been loaded.
$autoloadingFile = __DIR__ . '/../vendor/autoload.php';

if ( !is_readable( $autoloadingFile ) ) {
	throw new RuntimeException( 'Install dependencies to run test suite.' );
}

require_once $autoloadingFile;

// PSR-0 autoloader for test classes.
spl_autoload_register( function ( $class ) {
	if ( substr( $class, 0, 21 ) === 'CommitReplicator/Tests' ) {
		$fileName = __DIR__ . '/' . str_replace( "\\", DIRECTORY_SEPARATOR, $class ) . '.php';

		if ( is_readable( $fileName ) ) {
			require $fileName;
		}
	}
} );
