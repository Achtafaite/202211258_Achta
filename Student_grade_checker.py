#!/usr/bin/env python3
"""Student Grade Checker.

Calculates average score from multiple subjects and assigns letter grade:
- A: 90-100
- B: 80-89
- C: 70-79
- D: 60-69
- F: below 60
"""

def calculate_average(scores):
    """Calculate average of scores."""

    if not scores:
        raise ValueError("No scores provided!")
    return sum(scores) / len(scores)

def get_grade(average):
    """Get letter grade based on average score."""

    if average >= 90:
        return 'A'
    elif average >= 80:
        return 'B'
    elif average >= 70:
        return 'C'
    elif average >= 60:
        return 'D'
    else:
        return 'F'

def main():
    print("=== Student Grade Checker ===")
    print("Enter student scores (separated by spaces). Enter empty line to finish.")

    scores = []
    while True:
        line = input("Enter scores (e.g., 85 92 78) or empty to calculate: ").strip()
        if not line:
            break
        try:
            score_list = [float(s) for s in line.split()]
            if any(s < 0 or s > 100 for s in score_list):
                print("Scores must be between 0 and 100.")
                continue
            scores.extend(score_list)
        except ValueError:
            print("Invalid score. Use numbers only.")

    if not scores:
        print("No valid scores entered. Exiting.")
        return

    average = calculate_average(scores)
    grade = get_grade(average)

    print(f"\nScores: {scores}")
    print(f"Average: {average:.2f}")
    print(f"Grade: {grade}")

if __name__ == "__main__":
    main()
