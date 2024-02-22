<?php

/**
 * Queue Implementation using PHP Array
 *
 * A queue is a linear data structure that follows the First-In-First-Out (FIFO) principle.
 * In a queue, elements are added at the rear (enqueue) and removed from the front (dequeue).
 * This implementation uses a PHP array to simulate a queue, where the front of the queue
 * corresponds to the beginning of the array, and the rear corresponds to the end of the array.
 * It provides methods for enqueueing, dequeueing, checking if the queue is empty, and getting
 * the size of the queue. Queues are commonly used for tasks like managing tasks in a print spooler,
 * handling requests in web servers, and solving problems in graph algorithms.
 *
 * @author Junaid Bin Jaman
 * @version 1.0
 */

class Queue {
    public $queue;

    function __construct() {
        $this->queue = [];
    }

    function enqueue( $data ) {
        array_push( $this->queue, $data );
    }

    function dequeue() {
        if ($this->isEmpty()) {
            echo 'The queue is empty';
            return;
        }

        return array_shift( $this->queue );
    }

    function peek() {
        return $this->queue[0];
    }

    function isEmpty() {
        return empty($this->queue);
    }
}

$apiRequestQueue = new Queue();

// Simulate enqueuing API requests
$apiRequestQueue->enqueue("Fetch user data");
$apiRequestQueue->enqueue("Update profile information");
$apiRequestQueue->enqueue("Fetch latest posts");

while (!$apiRequestQueue->isEmpty()) {
    $request = $apiRequestQueue->dequeue();
    echo "Processing request: $request\n";
}
