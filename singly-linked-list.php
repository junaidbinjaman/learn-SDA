<?php
/**
 * Singly Linked List Implementation in PHP
 *
 * This PHP script demonstrates a basic implementation of a singly linked list data structure.
 * A singly linked list consists of nodes where each node stores data and a reference to the
 * next node in the sequence. The script includes a LinkedListNode class and a LinkedList class
 * with methods for inserting, deleting, and traversing the linked list.
 *
 * @author Junaid Bin Jaman
 * @version 1.0
 */

class Node {
	public $data;
	public $next;

	function __construct( $data ) {
		$this->data = $data;
		$this->next = null;
	}
}

class LinkedList {
	public $head;
	public $tail;

	function __construct() {
		$this->head = null;
		$this->tail = null;
	}

	function printList( $includePointers = false ) {
		if ( $includePointers ) {
			echo 'Head: ' . ( $this->head ? $this->head->data : 'Null' ) . "\n";
			echo 'Tail: ' . ( $this->tail ? $this->tail->data : 'Null' ) . "\n";
		}

		$current = $this->head;

		while ( $current !== null ) {
			echo $current->data . ' -> ';
			$current = $current->next;
		}
	}

	function insertAtBeginning( $data ) {
		$newNode = new Node( $data );

		if ( $this->head === null ) { // The list is empty.
			$this->head = $newNode;
			$this->tail = $newNode;
		} else { // Add at the bigging of the linked list
			$newNode->next = $this->head;
			$this->head    = $newNode;
		}
	}

	function insertAtEnd( $data ) {
		$newNode = new Node( $data );

		if ( $this->tail === null ) { // The list is empty.
			$this->head = $newNode;
			$this->tail = $newNode;
		} else { // Add at the end. The list is not empty.
			$this->tail->next = $newNode;
			$this->tail       = $newNode;
		}
	}

	function insertAtPosition( $data, $position ) {
		$newNode = new Node( $data );

		if ( $position <= 0 ) {
			$this->insertAtBeginning( $data );
			return;
		}

		$current = $this->head;
		$count   = 1;

		while ( $count < $position && $current !== null ) {
			$current = $current->next;
			++$count;
		}

		if ( $current === null ) {
			echo "Invalid position \n";
			return;
		}

		if ( $current->next === null ) {
			$this->insertAtEnd( $data );
			return;
		}

		$newNode->next = $current->next;
		$current->next = $newNode;
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
			// If there's only one node in the list
			$this->head = null;
			$this->tail = null;
			return;
		}

		$prevNode = null;
		$current  = $this->head;

		// Traverse the list to find the second-to-last node
		while ( $current->next !== null ) {
			$prevNode = $current;
			$current  = $current->next;
		}

		// Update pointers to remove the last node
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

		$prevNode    = null;
		$currentNode = $this->head;
		$count       = 1;

		while ( $count < $position && $currentNode !== null ) {
			$prevNode    = $currentNode;
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

		$prevNode->next    = $currentNode->next;
		$currentNode->next = null;
	}
}

$list = new LinkedList();
$list->insertAtBeginning( 5 );
$list->insertAtBeginning( 4 );
$list->insertAtBeginning( 3 );
$list->insertAtBeginning( 2 );
$list->insertAtBeginning( 1 );
$list->insertAtPosition( 6, 2 );
// $list->removeFromBeginning();
// $list->removeFromEnd();
$list->removeAtPosition( 3 );
$list->printList( true );
