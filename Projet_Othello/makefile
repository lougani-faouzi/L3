output: othello.o main.o
	gcc othello.o main.o -o othello

othello.o: othello.c othello.h
	gcc -c othello.c

main.o: main.c
	gcc -c main.c

clean: 
	rm *.o	