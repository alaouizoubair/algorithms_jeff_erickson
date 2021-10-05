# Lattice Multiplication Algorithm

## Preface
This series of algorithms is based on and inspired by Jeff Erickson's book: Algorithms. All my thanks go to him and his team.
On the other hand, I hope you would join in enriching this series by adding other languages and benchmarking performance.
Leave me some comments, I will gladely respond to any raised issues and answer your questions.


## Introduction
The Lattice algorithm was popularized by Fibonacci in "Liber Abaci" and is the most familiar method for multiplicating large numbers in US schools.
Fibonacci learned it from Arabic sources including Al-Khwarizmi, who in turn learned it from Indian sources including Brahmagupta.
[Source: Alhorithms by Jeff Erickson]

## Input & Output

### Input
The input consists of a pair of arrays containing only digits and representing the numbers. 

### Output 
The output is similarly consiting of a single digit array.

## Algorithm
FIBONACCIMULTIPLY(X[0...m-1],Y[0...n-1]):
    hold <- 0
    for k <- 0 to n+m-1:
        for all i and j such as i+j=k:
            hold <- hold + X[i]*Y[j]
        Z[k] <- hold % 10
        hold <- hold/10
    return Z[0...m+n-1]