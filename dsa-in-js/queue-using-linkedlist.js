class Node {
    constructor(element) {
        this.element = element;
        this.next = null
    }
}

class Queue {
    constructor() {
        this.front = null;
        this.rear = null;
        this.maxSize = 6;
        this.size = 0;
    }

    enqueue(element) {
        if ( this.maxSize <= this.size ) return 'Overflow';
        
        let newNode = new Node(element);

        if (!this.rear) {
            this.front = this.rear = newNode;
        } else {
            this.rear.next = newNode;
            this.rear = newNode;
        }

        this.size++;
        return this;
    }

  dequeue() {
    if (this.size === 0) return 'Underflow';
  
    var current = this.front;

    this.front = this.front.next;
    current.next = null;
    
    this.size--;
    console.log(current.element);
    return this;
  }
}

const queue = new Queue();
queue.enqueue(20);
queue.enqueue(30);
queue.enqueue(40);
queue.enqueue(50);

queue.dequeue();
