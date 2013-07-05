<?php

namespace CommitReplicator\Tests\Integration;

use FilesystemIterator;
use GitWrapper\GitWrapper;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * @covers GitWrapper\GitWrapper
 *
 * @file
 * @ingroup CommitReplicator
 * @group CommitReplicator
 * @group medium
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class GitWrapperTest extends \PHPUnit_Framework_TestCase {

	public function testCanClone() {
		$buildPath = '/tmp/CommitReplicatorBuild';
		$this->removeDirectory( $buildPath );

		$wrapper = new GitWrapper();
		$git = $wrapper->workingCopy( $buildPath );

		$git->cloneRepository( 'https://github.com/JeroenDeDauw/CommitReplicator.git' );

		$this->assertTrue( file_exists( $buildPath . '/CommitReplicator.php' ) );

		$git->remote( 'add', 'github', 'https://github.com/JeroenDeDauw/CommitReplicator.git' );

		$git->remote();

		touch( $buildPath . '/foo.txt' );

		$git->add( $buildPath . '/foo.txt' );

		$git->checkout( '-b', 'newBranch' );
		$git->checkout( 'newBranch' );

		$git->status();

		$this->assertStringEqualsFile( __DIR__ . '/ExpectedGitOutput.txt', $git->getOutput() );
	}

	function removeDirectory( $dirPath ) {
		if ( !file_exists( $dirPath ) ) {
			return;
		}

		/**
		 * @var SplFileInfo $path
		 */
		foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
			$path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
		}
	}

}
