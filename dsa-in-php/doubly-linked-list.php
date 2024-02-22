<?php

/**
 * Doubly Linked List Implementation in PHP
 *
 * This PHP script demonstrates the implementation of a doubly linked list data structure.
 * A doubly linked list consists of nodes where each node contains data and references to
 * both the next and the previous nodes in the sequence. This structure allows for efficient
 * bidirectional traversal and manipulation of the list.
 *
 * @author Junaid Bin Jaman
 * @version 1.0
 */

class Node {
	public $data;
	public $prev;
	public $next;

	function __construct( $data ) {
		$this->data = $data;
		$this->prev = null;
		$this->next = null;
	}
}

class DoublyLinkedList {
	public $head;
	public $tail;

	function __construct() {
		$this->head = null;
		$this->tail = null;
	}

	function displayForward( $includePointers = false ) {
		if ( $includePointers ) {
			echo 'Head: ' . ( $this->head ? $this->head->data : 'Null' ) . "\n";
			echo 'Tail: ' . ( $this->tail ? $this->tail->data : 'Null' ) . "\n";
		}

		if ( $this->head === null ) {
			echo 'The list is empty';
			return;
		}

		$currentNode = $this->head;

		while ( $currentNode !== null ) {
			echo $currentNode->data . ' ';
			$currentNode = $currentNode->next;
		}
		echo "\n";
	}

	function displayBackward( $includePointers = false ) {
		if ( $includePointers ) {
			echo 'Head: ' . ( $this->head ? $this->head->data : 'Null' ) . "\n";
			echo 'Tail: ' . ( $this->tail ? $this->tail->data : 'Null' ) . "\n";
		}

		if ( $this->head === null ) {
			echo 'The list is empty';
			return;
		}

		$currentNode = $this->tail;

		while ( $currentNode !== null ) {
			echo $currentNode->data . ' ';
			$currentNode = $currentNode->prev;
		}

		echo "\n";
	}

	function insertAtBeginning( $data ) {
		$newNode = new Node( $data );

		if ( $this->head === null ) {
			$this->head = $newNode;
			$this->tail = $newNode;
			return;
		}

		$newNode->next    = $this->head;
		$newNode->prev    = null;
		$this->head->prev = $newNode;
		$this->head       = $newNode;
	}

	function insertAtEnd( $data ) {
		$newNode = new Node( $data );

		if ( $this->head === null ) {
			$this->head = $newNode;
			$this->tail = $newNode;
			return;
		}

		$this->tail->next = $newNode;
		$newNode->prev    = $this->tail;
		$newNode->next    = null;
		$this->tail       = $newNode;
	}

	function insertAtPosition( $data, $position ) {
		$newNode = new Node( $data );

		if ( $position === 1 ) {
			$this->insertAtBeginning( $data );
			return;
		}

		$currentNode = $this->head;
		$count       = 1;

		while ( $count < $position && $currentNode !== null ) {
			$currentNode = $currentNode->next;
			++$count;
		}

		if ( $currentNode === null ) {
			echo "Invalid Position \n";
			return;
		}

		if ( $currentNode->next === null ) {
			$this->insertAtEnd( $data );
			return;
		}

		$nextNode          = $currentNode->next;
		$newNode->prev     = $currentNode;
		$currentNode->next = $newNode;
		$newNode->next     = $nextNode;
		$nextNode->prev    = $newNode;
	}

	function removeFromBeginning() {
		if ( $this->head === null ) {
			echo "The list is empty \n";
			return;
		}

		$removedNode = $this->head;

		if ( $this->head->next === null ) {
			$this->head = null;
			$this->tail = null;
			return;
		}

		$this->head        = $removedNode->next;
		$removedNode->next = null;
	}

	function removeFromEnd() {
		if ( $this->head === null ) {
			echo "The list is empty \n";
			return;
		}

		if ( $this->head->next === null ) {
			$this->head = null;
			$this->tail = null;
			return;
		}

		$prevNode       = $this->tail->prev;
		$prevNode->next = null;
		$this->tail     = $prevNode;
	}

	function removeAtPosition( $position ) {
		if ( $this->head === null ) {
			echo "The list is empty \n";
			return;
		}

		if ( $position === 1 ) {
			$this->removeFromBeginning();
			return;
		}

		$currentNode = $this->head;
		$count       = 1;

		while ( $count < $position && $currentNode !== null ) {
			$currentNode = $currentNode->next;
			++$count;
		}

		if ( $currentNode === null ) {
			echo "Invalid position \n";
			return;
		}

		if ( $currentNode->next === null ) {
			$this->removeFromEnd();
			return;
		}

		$prevNode = $currentNode->prev;
		$nextNode = $currentNode->next;

		$prevNode->next    = $currentNode->next;
		$nextNode->prev    = $prevNode;
		$currentNode->prev = null;
		$currentNode->next = null;
	}

	function searchNode( $key ) {
		$currentNode = $this->head;

		while ( $currentNode !== null ) {
			if ( $currentNode->data === $key ) {
				echo 'The key ' . $currentNode->data . " Does exists \n";
				return $currentNode;
			}

			$currentNode = $currentNode->next;
		}

		echo 'The key ' . $key . " doesn't exist \n";
		return null;
	}

	function countNode() {
		$currentNode = $this->head;
		$count       = 0;

		while ( $currentNode !== null ) {
			$currentNode = $currentNode->next;
			++$count;
		}

		echo 'Total node is: ' . $count . "\n";
		return $count;
	}
}

// Example Usage
$linkedList = new DoublyLinkedList();
$linkedList->insertAtBeginning( 1 );
$linkedList->insertAtBeginning( 2 );
$linkedList->insertAtBeginning( 3 );
$linkedList->insertAtBeginning( 4 );
$linkedList->insertAtBeginning( 5 );
$linkedList->insertAtEnd( 6 );
$linkedList->insertAtPosition( 8, 3 );
$linkedList->removeAtPosition( 3 );
$linkedList->searchNode( 50 );
$linkedList->countNode();
$linkedList->displayForward( true );
