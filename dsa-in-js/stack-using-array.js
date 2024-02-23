class Stack {
    constructor() {
      this.items = [];
    }
  
    push(element) {
      return this.items.push(element);
    }
  
    pop() {
      if (this.items.length === 0) return 'Underflow';
  
      return this.items.pop();
    }
  
    peek() {
      return this.items[this.items.length - 1];
    }
  
    isEmpty() {
      return this.items.length === 0;
    }
  
    printStack() {
      let str = '';
  
      for (let i = 0; i < this.items.length; i++) {
        str += this.items[i] + ', ';
      }
  
      return str;
    }
  }
  
  const stack = new Stack();
  
  stack.push(20);
  stack.push(30);
  stack.push(40);
  stack.push(50);
  
  stack.pop()
  stack.peek()
  stack.isEmpty()
  stack.printStack()
  