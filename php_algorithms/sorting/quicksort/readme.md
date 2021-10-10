# Quicksort Algorithm

## Preface
This series of algorithms is based on and inspired by Jeff Erickson's book: Algorithms. All my thanks go to him and his team.
On the other hand, I hope you would join in enriching this series by adding other languages and benchmarking performance.
Leave me some comments, I will gladely respond to any raised issues and answer your questions.


## Introduction
Quicksort is another recursive sorting algorithm, discovered by tony hoare in 1959 and published in 1961. In this algorithm, the hard work is splitting the array into smaller sub-arrays before recursion.
[Source: Alhorithms by Jeff Erickson]

## Input & Output

### Input
List of characters  

### Output 
Sorted result in String format 
## Algorithm
```
   QUICKSORT(A[1...n]):
    if n > 1:
        Choose a pivot element A[p]
        r <-  PARTITION(A,p)
        QUICKSORT(A[1...r-1])
        QUICKSSORT(A[r+1...n])


    PARTITION(A[1...n],p):
        swap A[p] <- A[n]
        l <- 0
        for i = 1 to n-1:
            if A[i] < A[n] :
                l = l+1
                swap A[l] <-> A[i]
        swap A[n] <-> A[l+1]
        return l+1
                
```