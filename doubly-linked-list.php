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

    function insertAtPosition($data, $position) {
        $newNode = new Node( $data );

        if ($position === 1) {
            $this->insertAtBeginning($data);
            return;
        }

        $currentNode = $this->head;
        $count = 1;

        while( $count < $position && $currentNode !== null ) {
            $currentNode = $currentNode->next;
            $count++;
        }

        if ($currentNode === null) {
            echo "Invalid Position \n";
            return;
        }

        if ($currentNode->next === null) {
            $this->insertAtEnd($data);
            return;
        }

        $nextNode = $currentNode->next;
        $newNode->prev = $currentNode;
        $currentNode->next = $newNode;
        $newNode->next = $nextNode;
        $nextNode->prev = $newNode;
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
$linkedList->displayForward( true );
