%{
/*   PROJET COMPILATION DE LOUGANI FAOUZI
     LOUGANI FAOUZI
*/
#include <stdio.h>
#include <stdlib.h>
#include <math.h>
char message[50];
int yyparse();
int yyerror (const char*msg);
int yylex();

%}

%union  {int en;char *ch1,*ch2;}   
%token  <en>DEUX_POINTS DIESE CHAINE
%token  <en>ENTIER
%token  <en>ROLE ALGORITHME SAUTLIGNE DEBUT FIN
%token  AFFICHER LIRE
%token  PARENTHESE_GAUCHE PARENTHESE_DROITE
%token  <en>ALORS SI SINON FSI
%token  <en>IDENT
%token  INF INFEGAL SUP SUPEGAL EGAL DEGAL DIFF ET OU NON
%token  PLUS MOINS FOIS DIVISE PUISSANCE MODULO RACINE
%token  TYPE
%token  carinvalide
%token <en>DECLARATION
%type  <en>DECLARATIONS // j'ai utilisé DECLARATIONS ET DECLARATION POUR DIFFRENCIER ENTRE LE TOUT ET UNE SEULE DECLARATION
%type <en> PROG
%type <en> Q1
%type <en> Q
%type <en> R
%type <en> A
%type <en> B
%type <en> C
%type <en> COMMENTAIRES
%type <en> PROGRAMME
%type <en> INSTRUCTION
%type <en> OPERATIONS
%type <en> CONDITION
%type <en> EXPRESSION
%left PLUS  MOINS FOIS DIVISE NEG




%start Q

%%

Q:ALGORITHME SAUTLIGNE Q1 
  | carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;

Q1:R SAUTLIGNE DECLARATIONS PROG  
  ;

R:ROLE DEUX_POINTS C
  ;
 
C:CHAINE C
  |CHAINE
  ;

DECLARATIONS:DECLARATION SAUTLIGNE A
  |carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;

//Dans cette partie (A et B) j'ai regrouper les identifiants par type en respectant la syntaxe demandée

A:IDENT "," A                             
  |IDENT A
  |B
  |carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;

B: DEUX_POINTS TYPE SAUTLIGNE A  
  |DEUX_POINTS SAUTLIGNE   
  |DEUX_POINTS TYPE COMMENTAIRES SAUTLIGNE A  
  |DEUX_POINTS TYPE COMMENTAIRES SAUTLIGNE    
  ;

COMMENTAIRES:DIESE C    //aulieu d'utiliser une autre variable pour la partie aprés le # j'ai utilisé le C precedent pour optimiser la regle 
  ;


PROG:DEBUT SAUTLIGNE PROGRAMME FIN 
;

PROGRAMME:INSTRUCTION SAUTLIGNE PROGRAMME   
  |OPERATIONS SAUTLIGNE PROGRAMME  
  |INSTRUCTION SAUTLIGNE      
  |OPERATIONS SAUTLIGNE      
  |COMMENTAIRES SAUTLIGNE PROGRAMME     
  | carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;


INSTRUCTION :AFFICHER PARENTHESE_GAUCHE IDENT PARENTHESE_DROITE    { printf("%d",$3);}
  |LIRE PARENTHESE_GAUCHE IDENT PARENTHESE_DROITE                  { scanf("%d",&$$);}
  |AFFICHER PARENTHESE_GAUCHE EXPRESSION PARENTHESE_DROITE         {$$=$3; printf("%d",$$);}
  |LIRE PARENTHESE_GAUCHE EXPRESSION PARENTHESE_DROITE             { scanf("%d",&$$);}
  |SI CONDITION ALORS INSTRUCTION FSI                     
  |SI CONDITION ALORS INSTRUCTION SINON INSTRUCTION FSI
  |IDENT EGAL EXPRESSION {$$=$3;}
  |EXPRESSION
  | carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;

EXPRESSION: ENTIER {$$=$1;}
  |IDENT
  | carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;

OPERATIONS:  EXPRESSION PLUS EXPRESSION            { $$=$1+$3; }
  | EXPRESSION MOINS EXPRESSION                    { $$=$1-$3; }
  | EXPRESSION FOIS EXPRESSION                     { $$=$1*$3; }
  | EXPRESSION DIVISE EXPRESSION                   { $$=$1/$3; }
  | EXPRESSION MODULO EXPRESSION                   { $$=$1%$3; }
  | MOINS EXPRESSION %prec NEG                     { $$=-$2;   }     //j'ai ajouter l'operateur opérateur unaire du TP5
  | EXPRESSION PUISSANCE EXPRESSION                { $$=pow($1,$3); }
  | RACINE EXPRESSION                              { $$=sqrt($2);   }//les fonction mathematiques (sqrt..cos ...) voila un exemple 
  | PARENTHESE_GAUCHE EXPRESSION PARENTHESE_DROITE { $$=$2; }
 ;




CONDITION :
  EXPRESSION INF EXPRESSION           {$$=0; if($1<$3)  $$=1;}
  |EXPRESSION INFEGAL  EXPRESSION     {$$=0; if($1<=$3) $$=1;}
  |EXPRESSION SUP EXPRESSION          {$$=0; if($1>$3)  $$=1;}
  |EXPRESSION SUPEGAL EXPRESSION      {$$=0; if($1>=$3) $$=1;}
  |EXPRESSION DEGAL EXPRESSION        {$$=0; if($1==$3) $$=1;}
  |EXPRESSION EGAL EXPRESSION         {$$=0; if($1=$3) $$=1;}
  |EXPRESSION DIFF EXPRESSION         {$$=0; if($1!=$3) $$=1;}
  |EXPRESSION ET EXPRESSION           {$$=0; if($1&&$3) $$=1;}
  |EXPRESSION OU EXPRESSION           {$$=0; if($1||$3) $$=1;}
  |NON EXPRESSION                     {$$=0; if(!$2)    $$=1;}
  | carinvalide { sprintf(message, "caractere invalide : %c", $$); yyerror(message);}
  ;





%%


int yyerror ( const char *msg){
	printf(" erreur: %s \n",msg);
	exit(0);
}

int main (void){
	printf("entrez votre algorithme svp \n");
        yyparse();
        
}



