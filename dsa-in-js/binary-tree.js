class Node {
    constructor(element) {
      this.element = element;
      this.left = this.right = null;
    }
  }
  
  class BinaryTree {
    constructor() {
      this.root = null;
    }
  
    insert(element) {
      var newNode = new Node(element);
  
      if (!this.root) {
        this.root = newNode;
      } else {
        this.insertNode(this.root, newNode);
      }
  
      return this; // Return the binary tree object after insertion
    }
  
    insertNode(root, newNode) {
      if (newNode.element < root.element) {
        if (!root.left) {
          root.left = newNode;
        } else {
          this.insertNode(root.left, newNode);
        }
      } else {
        if (!root.right) {
          root.right = newNode;
        } else {
          this.insertNode(root.right, newNode);
        }
      }
    }
  
    search(element) {
      return this.searchNode(this.root, element);
    }
  
    searchNode(root, element) {
      if (!root) {
        return false;
      }
  
      if (root.element > element) {
        return this.searchNode(root.left, element);
      } else if (root.element < element) {
        return this.searchNode(root.right, element);
      } else {
        return true;
      }
    }
  }
  
  var bt = new BinaryTree();
  
  bt.insert(2).insert(1).insert(5).insert(40).insert(3);
  
  console.log(bt.search(1)); // Output: true
  