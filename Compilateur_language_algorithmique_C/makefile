LOUGANI: LOUGANI.tab.c lex.yy.c
	gcc LOUGANI.tab.c lex.yy.c -lfl -lm -o  LOUGANI

LOUGANI.tab.c:LOUGANI.y
	bison -d LOUGANI.y
	
lex.yy.c:LOUGANI.l
	flex LOUGANI.l
	
clean:
	rm LOUGANI.tab.c LOUGANI.tab.h lex.yy.c LOUGANI



