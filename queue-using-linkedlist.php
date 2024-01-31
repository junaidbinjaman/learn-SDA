<?php

/**
 * Queue Implementation using PHP linkedList
 *
 * A queue is a linear data structure that follows the First-In-First-Out (FIFO) principle.
 * In a queue, elements are added at the rear (enqueue) and removed from the front (dequeue).
 * This implementation uses a PHP linkedList to simulate a queue, where the front of the queue
 * corresponds to the beginning of the linkedList, and the rear corresponds to the end of the linkedList.
 * It provides methods for enqueueing, dequeueing, checking if the queue is empty, and getting
 * the size of the queue. Queues are commonly used for tasks like managing tasks in a print spooler,
 * handling requests in web servers, and solving problems in graph algorithms.
 *
 * @author Junaid Bin Jaman
 * @version 1.0
 */

class Node {
	public $data;
	public $next;

	public function __construct( $data ) {
		$this->data = $data;
		$this->next = null;
	}
}

class Queue {
	public $front = null;
	public $back  = null;

	function enqueue( $data ) {
		$newNode = new Node( $data );

		if ( $this->back === null ) {
			$this->front = $this->back = $newNode;
		}

		$this->back->next = $newNode;
		$this->back       = $newNode;
	}

	function dequeue() {
		if ( $this->front === null ) {
			return null;
		}

		$data        = $this->front->data;
		$this->front = $this->front->next;

		if ( $this->front === null ) {
			$this->back === null;
		}

		return $data;
	}

	function peek() {
		if ( $this->isEmpty() ) {
			return null;
		}
		return $this->front->data;
	}

	function isEmpty() {
		return $this->front === null;
	}
}

$registrationQueue = new Queue();

// Simulate user registration actions
$registrationQueue->enqueue( 'Save User Data' );
$registrationQueue->enqueue( 'Send Welcome Email' );
$registrationQueue->enqueue( 'Generate User Recommendations' );

// Process the registration tasks
while ( ! $registrationQueue->isEmpty() ) {
	$task = $registrationQueue->dequeue();
	echo 'Processing: ' . $task . "\n";
	// Implement the processing logic for each task
}
