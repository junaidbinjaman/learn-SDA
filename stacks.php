<?php

/**
 * Stack Implementation using a Singly Linked List in PHP
 *
 * This PHP script demonstrates the implementation of a stack data structure using a
 * singly linked list as the underlying data storage. In a stack, elements are added and
 * removed in a Last-In-First-Out (LIFO) order. This implementation uses a singly linked
 * list for efficient stack operations like push and pop.
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

class Stack {
	public $top;

	function __construct() {
		$this->top = null;
	}

	function push( $data ) {
		$newNode       = new Node( $data );
		$newNode->next = $this->top;
		$this->top     = $newNode;
	}

	function pop() {
		if ( $this->isEmpty() ) {
			throw new RuntimeException( 'The stack is empty' );
		}

		$removedNode       = $this->top;
		$this->top         = $this->top->next;
		$removedNode->next = null;
		return $removedNode->data;
	}

	function top() {
		if ( $this->isEmpty() ) {
			throw new RuntimeException( 'The stack is empty' );
		}

		return $this->top->data;
	}

	function isEmpty() {
		return $this->top === null;
	}

	function size() {
		$currentNode = $this->top;
		$count       = 0;

		while ( $currentNode !== null ) {
			$currentNode = $currentNode->next;
			++$count;
		}

		return $count;
	}

	function print() {
		if ( $this->isEmpty() ) {
			throw new RuntimeException( 'The stack is empty' );
		}

		$currentNode = $this->top;

		while ( $currentNode !== null ) {
			echo $currentNode->data . "\n";
			$currentNode = $currentNode->next;
		}
	}
}

$stack = new Stack();
$stack->push( 'First' );
$stack->push( 'Second' );
$stack->push( 'Third' );

echo PHP_EOL;
echo $stack->pop(); // Outputs 'Third'
echo PHP_EOL;
echo $stack->top(); // Outputs 'Second'
echo PHP_EOL;
echo $stack->size(); // Outputs 2
echo PHP_EOL . "----------- \n";

$stack->print();
