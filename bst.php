<?php

/**
 * Binary Search Tree (BST) Implementation in PHP
 *
 * A Binary Search Tree (BST) is a hierarchical data structure consisting of nodes,
 * where each node has at most two children referred to as the left child and the
 * right child. The BST has the following key property:
 *
 * 1. For any given node in the tree, all nodes in its left subtree have values less
 *    than or equal to the node's value, and all nodes in its right subtree have
 *    values greater than the node's value. This property ensures that the tree is
 *    sorted and allows for efficient searching, insertion, and deletion operations.
 *
 * BSTs are widely used in various applications, including efficient searching,
 * sorting, and data retrieval. They are commonly used for implementing dictionary
 * data structures and are a foundational concept in computer science and algorithms.
 *
 * @author Junaid Bin Jaman
 * @version 1.0
 */

class Node {
	public $data;
	public $left;
	public $right;

	function __construct( $data ) {
		$this->data  = $data;
		$this->left  = null;
		$this->right = null;
	}
}

class BinarySearchTree {
	public $root;

	public function __construct() {
		$this->root = null;
	}

	public function insert( $data ) {
		$this->root = $this->insertNode( $this->root, $data );
	}

	private function insertNode( $node, $data ) {
		if ( $node === null ) {
			$node = new Node( $data );
			return $node;
		}

		if ( $data < $node->data ) {
			$node->left = $this->insertNode( $node->left, $data );
		}

		if ( $data > $node->data ) {
			$node->right = $this->insertNode( $node->right, $data );
		}

		return $node;
	}

	public function search( $data ) {
		return $this->searchNode( $this->root, $data );
	}

	private function searchNode( $node, $data ) {
		if ( $node === null || $data === $node->data ) {
			return $node;
		}

		if ( $data < $node->data ) {
			return $this->searchNode( $node->left, $data );
		}

		if ( $data > $node->data ) {
			return $this->searchNode( $node->right, $data );
		}
	}

	public function delete( $data ) {
		$this->root = $this->deleteNode( $this->root, $data );
	}

	private function deleteNode( $node, $data ) {
		if ( $node === null ) {
			return $node;
		}

		if ( $data < $node->data ) {
			$node->left = $this->deleteNode( $node->left, $data );
		}

		if ( $data > $node->data ) {
			$node->right = $this->deleteNode( $node->right, $data );
		}

		if ( $data === $node->data ) {
			if ( $node->left === null ) {
				return $node->right;
			}

			if ( $node->right === null ) {
				return $node->left;
			}

			$node->data  = $this->minValueNode( $node->right )->data;
			$node->right = $this->deleteNode( $node->right, $node->data );
		}

		return $node;
	}

	private function minValueNode( $node ) {
		while ( $node->left !== null ) {
			$node = $node->left;
		}
		return $node;
	}

	public function traverseInOrder() {
		$this->inOrder( $this->root );
	}

	private function inOrder( $node ) {
		if ( $node === null ) {
			return;
		}

		$this->inOrder( $node->left );

		echo $node->data . ' ';

		$this->inOrder( $node->right );
	}
}

$bst = new BinarySearchTree();
$bst->insert( 15 );
$bst->insert( 10 );
$bst->insert( 20 );
$bst->insert( 200 );

$bst->delete(200);

echo 'In-order traversal: ';
$bst->traverseInOrder();
