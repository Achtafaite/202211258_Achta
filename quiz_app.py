#!/usr/bin/env python3
"""Quiz Application.

Multiple choice quiz with 10 questions, scored out of 100.
Shows correct answers at the end.
"""

QUESTIONS = [
    {
        'question': 'What is 2 + 2?',
        'options': ['a) 3', 'b) 4', 'c) 5', 'd) 6'],
        'answer': 'b'
    },
    {
        'question': 'Capital of France?',
        'options': ['a) London', 'b) Berlin', 'c) Paris', 'd) Madrid'],
        'answer': 'c'
    },
    {
        'question': 'Which planet is closest to the Sun?',
        'options': ['a) Venus', 'b) Earth', 'c) Mercury', 'd) Mars'],
        'answer': 'c'
    },
    {
        'question': 'Python is what type of language?',
        'options': ['a) Low-level', 'b) Compiled', 'c) Interpreted', 'd) Binary'],
        'answer': 'c'
    },
    {
        'question': 'Number of sides in a triangle?',
        'options': ['a) 3', 'b) 4', 'c) 5', 'd) 6'],
        'answer': 'a'
    },
    {
        'question': 'H2O is the formula for?',
        'options': ['a) Oxygen', 'b) Salt', 'c) Water', 'd) Sugar'],
        'answer': 'c'
    },
    {
        'question': 'Who wrote Romeo and Juliet?',
        'options': ['a) Dickens', 'b) Shakespeare', 'c) Tolstoy', 'd) Austen'],
        'answer': 'b'
    },
    {
        'question': 'Largest ocean on Earth?',
        'options': ['a) Atlantic', 'b) Indian', 'c) Arctic', 'd) Pacific'],
        'answer': 'd'
    },
    {
        'question': 'Speed of light (approx km/s)?',
        'options': ['a) 30000', 'b) 300000', 'c) 3000', 'd) 3000000'],
        'answer': 'b'
    },
    {
        'question': 'Python lists are what type?',
        'options': ['a) Immutable', 'b) Mutable', 'c) Static', 'd) Fixed'],
        'answer': 'b'
    }
]

def run_quiz():
    score = 0
    total = len(QUESTIONS)
    user_answers = []
    correct_answers = []

    print("=== Quiz Time! ===")
    print("Choose a, b, c, or d. 10 questions, scored /100.\\n")

    for i, q in enumerate(QUESTIONS, 1):
        print(f"Q{i}: {q['question']}")
        for opt in q['options']:
            print(f"  {opt}")
        
        while True:
            ans = input("Your answer (a/b/c/d): ").strip().lower()
            if ans in 'abcd':
                break
            print("Please enter a, b, c, or d.")

        user_answers.append(ans)
        correct_answers.append(q['answer'])
        
        if ans == q['answer']:
            score += 10
        print()  # Blank line

    # Results
    print("=== Results ===")
    print(f"Your score: {score}/100")
    
    print("\\nReview:")
    for i in range(total):
        print(f"Q{i+1}: You: {user_answers[i]} | Correct: {correct_answers[i]}")

def main():
    run_quiz()
    again = input("\\nPlay again? (y/n): ").strip().lower()
    if again == 'y':
        main()

if __name__ == "__main__":
    main()

