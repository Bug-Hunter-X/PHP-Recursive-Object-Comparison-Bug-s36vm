function foo(a, b, visited = new Set()) {
  if (a === b) {
    return true;
  }
  if (typeof a !== 'object' || typeof b !== 'object' || a === null || b === null) {
    return false;
  }
  if (visited.has(a) || visited.has(b)) {
    return false; // Avoid circular references
  }
  visited.add(a);
  visited.add(b);
  const keysA = Object.keys(a);
  const keysB = Object.keys(b);
  if (keysA.length !== keysB.length) {
    return false;
  }
  for (let i = 0; i < keysA.length; i++) {
    const key = keysA[i];
    if (!b.hasOwnProperty(key) || !foo(a[key], b[key], visited)) {
      return false;
    }
  }
  return true;
}

// Example usage
const obj1 = { a: 1, b: 2, c: { d: 3 } };
const obj2 = { a: 1, b: 2, c: { d: 3 } };
const obj3 = { a: 1, b: 2, c: { d: 4 } };
const obj4 = {};
obj4.circular = obj4;
const obj5 = {};
obj5.circular = obj5;
console.log(foo(obj1, obj2)); // true
console.log(foo(obj1, obj3)); // false
console.log(foo(obj4, obj5)); //false