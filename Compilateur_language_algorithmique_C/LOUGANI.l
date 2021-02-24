%{
 
#include "LOUGANI.tab.h"
 
#include <stdlib.h>
 
%}

chiffre   [0-9]
entier    {chiffre}+
reel    {entier}("."{entier})?{exposant}?
l       [a-zA-Z]
bool    {vrai}|{faux}
exposant  [eE][+-]?{entier}
id      {l}({chiffre}|{l})*
chaine  {l}+
blancs    [ \t]+
type [entier,chaine,booleen,caractere,reel]
motcle [SI,FSI,SINON,LIRE,AFFICHER,FAIRE,FIN,DEBUT,ALGORITHME,DECLARATION]
%%
 
{blancs}   { /*rien a faire */ }
{entier}   { yylval.en=atoi(yytext); return(ENTIER);}
{type}         { return(TYPE);}
"entier"        return (TYPE);
"booleen"       return (TYPE);
"caractere" 	return (TYPE);
"chaine"     	return (TYPE); 
"Algorithme" 	return (ALGORITHME);
"Declaration"	return (DECLARATION);
"Debut"       	return (DEBUT);
"Fin"         	return (FIN);
"Role"        	return (ROLE);
"\n"     	return(SAUTLIGNE);
":"       	return(DEUX_POINTS);
"#"       	return(DIESE);
"("       	return(PARENTHESE_GAUCHE);
")"       	return(PARENTHESE_DROITE);
"afficher"  	return(AFFICHER);
"lire"    	return(LIRE);
"alors"   	return(ALORS);
"si"      	return(SI);
"sinon"   	return(SINON);
"fsi"     	return(FSI);
"+"       	return(PLUS);
"-"       	return(MOINS);
"*"       	return(FOIS);
"/"       	return(DIVISE);
"%"             return(MODULO);
"√"             return(RACINE);
"^"       	return(PUISSANCE);
"<"      	return(INF);
">"       	return(SUP);
"<="      	return(INFEGAL);
">="      	return(SUPEGAL);
"et"      	return(ET);
"ou"      	return(OU);
"non"     	return(NON);
"!="      	return(DIFF);
"="       	return(EGAL);
"=="      	return(DEGAL);
{chaine} 	{yylval.ch1=yytext;return(CHAINE);}
{id}     	{yylval.ch2=yytext; return(IDENT);}

