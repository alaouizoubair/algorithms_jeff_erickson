# Peasant Multiplication Algorithm

## Preface
This series of algorithms is based on and inspired by Jeff Erickson's book: Algorithms. All my thanks go to him and his team.
On the other hand, I hope you would join in enriching this series by adding other languages and benchmarking performance.
Leave me some comments, I will gladely respond to any raised issues and answer your questions.


## Introduction
An older multiplication algorithm than the Lattice is called Russian peasant multiplication or just peasent multiplication.
A variant of this algorithm was copied into the Rhind papyrus by the Egyptian scribe Ahmes around 1650BCE.
[Source: Alhorithms by Jeff Erickson]

## Input & Output

### Input
The input consists of two integers we wish to multiply 

### Output 
The output is an integer

### Constraint
This algorithm is valid for positive integers


## Algorithm
```
    PeasantMultiply(x,y):
        prod <- 0
        while x > 0 :
            if x is odd :
                prod <- prod + y
            x = x/2
            y = y + y
        return prod
```