# PHP Recursive Object Comparison Bug

This repository demonstrates a subtle bug in PHP code designed for recursively comparing objects. The code attempts to perform a deep comparison, but fails when encountering circular references within the objects being compared.

## Description

The PHP function `foo()` aims to recursively compare two objects.  However, if the objects contain circular references (where an object property refers back to the object itself, or indirectly to itself through a chain of references), the comparison enters an infinite loop, resulting in a stack overflow error.

## Bug

The `bug.php` file contains the flawed code.  The solution to mitigate this problem is to track visited objects during the recursive comparison to avoid infinite loops.

## Solution

The corrected code is provided in `bugSolution.php`.  This version uses a visited objects tracking mechanism to resolve the issue.  The solution includes the implementation of a method to check if the given value is an object and if it's already been visited.