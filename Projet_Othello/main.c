#include<stdio.h>
#include"othello.h"

int main () {

    char matrice[T][T];
    int i;
    
    int lig, col; 
	joueur jou, j_test;
	jou.num = 1;

    /* Initialisation du jeu */
    init_othellier (matrice);
    afficher_othellier (matrice);

    /* Deroulement d'une partie */
    while (!fin_jeu (matrice)) {
        lancer_pion (matrice, &lig, &col, jou);
        jouer_coup (matrice, lig, col, jou);
        afficher_othellier (matrice);
        j_test.num = joueur_next(jou);
        if (continuer_jeu(matrice, j_test))
            jou.num = joueur_next (jou);
        else printf ("\nLe joueur %d passe son tour\n", joueur_next(jou));
    }
    return 0;
}