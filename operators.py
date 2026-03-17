#!/usr/bin/env python3
"""Operator functions for the calculator."""

def add(x, y):
    return x + y

def subtract(x, y):
    return x - y

def multiply(x, y):
    return x * y

def divide(x, y):
    if y == 0:
        raise ValueError("Cannot divide by zero!")
    return x / y

OPERATIONS = {
    '+': add,
    '-': subtract,
    '*': multiply,
    '/': divide,
}

if __name__ == "__main__":
    # Test the operators
    print("Testing operators:")
    print(f"2 + 3 = {add(2, 3)}")
    print(f"5 - 2 = {subtract(5, 2)}")
    print(f"4 * 3 = {multiply(4, 3)}")
    print(f"10 / 2 = {divide(10, 2)}")

