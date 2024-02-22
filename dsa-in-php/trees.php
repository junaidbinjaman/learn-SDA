<?php

/**
 * Tree Data Structure in PHP
 *
 * A tree is a hierarchical data structure that consists of nodes connected by edges.
 * Each node in a tree has a parent node and zero or more child nodes. Trees are widely
 * used in various applications, such as representing hierarchical relationships,
 * organizing data, and optimizing search and retrieval operations.
 *
 * In a tree, there is a single node called the "root," from which all other nodes
 * descend. Nodes in a tree are typically divided into levels, with the root being
 * at level 0, its children at level 1, their children at level 2, and so on.
 *
 * Common types of trees include binary trees, binary search trees, AVL trees, and
 * B-trees, each with its own characteristics and use cases.
 *
 * Trees are used in a wide range of computer science and programming applications,
 * including representing file systems, organizing data in databases, and implementing
 * various searching and sorting algorithms.
 *
 * @author Junaid Bin Jaman
 * @version 1.0
 */

class Node {
	public $data;
	public $children;

	function __construct( $data ) {
		$this->data     = $data;
		$this->children = array();
	}

	function addChild( Node $node ) {
		$this->children[] = $node;
	}
}

class Tree {
	public $root;

	function __construct( $rootData ) {
		$this->root = new Node( $rootData );
	}

	function traversePreOrder( Node $node ) {
		if ( $node === null ) {
			return;
		}

		echo $node->data . ' ⬇️ ';

		foreach ( $node->children as $child ) {
			$this->traversePreOrder( $child );
		}
	}

	function traversePostOrder( Node $node ) {
		if ( $node === null ) {
			return;
		}

		foreach ( $node->children as $child ) {
			$this->traversePostOrder( $child );
		}

		echo $node->data . ' ⬇️ ';
	}

	function search( $data, Node $node ) {
		if ( $node === null ) {
			return false;
		}

		if ( $node->data === $data ) {
			return true;
		}

		foreach ( $node->children as $child ) {
			if ( $this->search( $data, $child ) ) {
				return true;
			}
		}
	}
}

$tree = new Tree( 'Root' );

$child1 = new Node( 'Child 1' );
$child2 = new Node( 'Child 2' );
$child3 = new Node( 'Child 3' );

$grandChild1 = new Node( 'Grand Child 1' );
$grandChild2 = new Node( 'Grand Child 2' );
$grandChild3 = new Node( 'Grand Child 3' );

$tree->root->addChild( $child1 );
$tree->root->addChild( $child2 );

$child1->addChild( $grandChild1 );
$child1->addChild( $grandChild2 );
$child2->addChild( $grandChild3 );

$tree->root->addChild( $child3 );

// Perform pre-order traversal starting from the root
echo 'Pre-order traversal result: ';
$tree->traversePostOrder( $tree->root );

$result = $tree->search( 'Grand Child 1', $tree->root );

echo PHP_EOL;

if ( $result ) {
    echo 'The data exists';
} else {
    echo 'The data doesn\'t exists';
}
