class Queue {
  constructor() {
    this.items = [];
  }

  enqueue(element) {
    this.items.push(element);
  }

  dequeue() {
    if (this.isEmpty()) {
      return 'Underflow';
    }

    return this.items.shift();
  }

  front() {
    if (this.isEmpty()) return 'No elements in Queue<br>';
    return this.items[0];
  }

  rear() {
    if (this.isEmpty()) {
      return 'Underflow';
    }

    return this.items[this.items.length - 1];
  }

  isEmpty() {
    return this.items.length === 0;
  }
}
