# Mergesort Algorithm

## Preface
This series of algorithms is based on and inspired by Jeff Erickson's book: Algorithms. All my thanks go to him and his team.
On the other hand, I hope you would join in enriching this series by adding other languages and benchmarking performance.
Leave me some comments, I will gladely respond to any raised issues and answer your questions.


## Introduction
Megasort is one of the earliest algorithms designed for general-purpose stored-program computer. The algorithm was developed by John Von Neumann in 1945.
[Source: Alhorithms by Jeff Erickson]

## Input & Output

### Input
List of characters  

### Output 
Sorted result in String format 
## Algorithm
```
   MERGESORT(A[1...n]):
    if n > 1:
        m <- n/2
        MERGESORT(A[1...m])
        MERGESORT(A[m+1...n])
        MERGE(A[1...n],m])


    MERGE(A[1...n],m):
        i <- 1
        j <- m+1
        for k <- 1 to n :
            if j>n:
                B[k] <- A[i]
                i <- i+1
            else if i > m:
                B[k] <- A[j]
                j <- j+1
            else if A[i] < A[j]:
                B[k] <- A[i]
                i <- i+1
            else
                B[k] <- A[j]
                j <- j+1
        for k <- 1 to n:
            A[k] = B[k]
```