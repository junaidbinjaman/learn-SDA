class Node {
  constructor(element) {
    this.element = element;
    this.next = null;
  }
}

class LinkedList {
  constructor() {
    this.head = null;
    this.tail = null;
    this.size = 0;
  }

  add(element) {
    var newNode = new Node(element);

    if (!this.head) {
      this.head = newNode;
      this.tail = newNode;
    } else {
      this.tail.next = newNode;
      this.tail = newNode;
    }

    this.size++;
    return this;
  }

  insertAt(element, index) {
    // Handle invalid index
    if (index < 0 || index > this.size) {
      return 'Invalid Index';
    }

    const newNode = new Node(element);

    if (index === 0) {
      if (this.size === 0) {
        this.add(element);
        return this;
      } else {
        newNode.next = this.head;
        this.head = newNode;
      }
    } else {
      let currentNode = this.head;
      let previousNode = null;

      for (let i = 0; i < index; i++) {
        previousNode = currentNode;
        currentNode = currentNode.next;
      }

      previousNode.next = newNode;
      newNode.next = currentNode;

      if (index === this.size) {
        this.tail = newNode;
      }
    }

    this.size++;
    return this;
  }

  remove(index) {
    if (index < 0 || index > this.size) {
      return 'Invalid Index';
    }

    // Remove from start
    if (index === 0) {
      this.head = this.head.next;

      if (!this.head) {
        this.tail = null;
      }
    } else {
      var currentNode = this.head;
      var previousNode = null;

      for (let i = 0; i < index; i++) {
        previousNode = currentNode;
        currentNode = currentNode.next;
      }

      if (!currentNode.next) {
        // Remove from end
        this.tail = previousNode;
        this.tail.next = null;
      } else {
        // Remove from a specific index
        previousNode.next = currentNode.next;
        currentNode.next = null;
      }
    }

    this.size--;
    return this;
  }

  removeElement(element) {
    var currentNode = this.head;
    var previousNode = null;

    for (let i = 0; i < this.size; i++) {
      if (currentNode.element == element) {
        break;
      }

      previousNode = currentNode;
      currentNode = currentNode.next;
    }

    if (!currentNode) {
      return 'Invalid element';
    }
    
    previousNode.next = currentNode.next;
    currentNode.next = null;

    this.size--;
    return this;
  }

  indexOf(element) {
    var count = 0;
    var currentNode = this.head;

    for (let i = 0; i < this.size; i++) {
      if (currentNode.element === element) {
        break;
      }

      count++;
      currentNode = currentNode.next;
    }

    
    if (!currentNode) {
      return 'Invalid element';      
    }

    return count;
  }

  isEmpty() {
    return this.size === 0;
  }

  printList() {
    var currentNode = this.head;
    var str = '';

    for (let i = 0; i < this.size; i++) {
      str += currentNode.element + ' ';
      currentNode = currentNode.next;      
    }

    return str;
  }
}

var ll = new LinkedList();

ll.add(20);
ll.add(30);
ll.add(40);
ll.add(50);

ll.insertAt(60, 4);
// ll.remove(3);

ll.printList();
