#!/usr/bin/env python3
"""Simple command-line calculator."""

from operators import OPERATIONS

def main():
    print("=== Simple Calculator ===")
    print("Enter 'q' to quit.")
    print("Supported operations: +, -, *, /")
    
    while True:
        try:
            expression = input("\nEnter expression (e.g., 10 + 5): ").strip()
            if expression.lower() == 'q':
                print("Goodbye!")
                break
            
            parts = expression.split()
            if len(parts) != 3:
                print("Invalid format! Use: number operator number")
                continue
            
            x = float(parts[0])
            op = parts[1]
            y = float(parts[2])
            
            if op not in OPERATIONS:
                print("Invalid operator! Use +, -, *, /")
                continue
            
            result = OPERATIONS[op](x, y)
            print(f"Result: {result}")
            
        except ValueError as e:
            print(f"Error: {e}")
        except Exception as e:
            print(f"Unexpected error: {e}")

if __name__ == "__main__":
    main()

