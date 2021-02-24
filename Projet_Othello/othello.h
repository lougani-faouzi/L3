#ifndef OTHELLO_H
#define OTHELLO_H

/* Largeur de la grille */
#define T 8

/* Pions du jeu */
//#define VIDE ' '

#define N 'X'  /* joueur 1 */
#define B 'O' /* joueur 2 */

/* Type du plateau de jeu */

struct joueur
{
    int num;
    char nom[30];

};

typedef struct joueur joueur;

void init_othellier(char matrice[T][T]);
void afficher_othellier (char matrice[T][T]);
int verifier_case(int lig, int col);
int coup_correct (char matrice[T][T], int lig, int col, joueur j);
int continuer_jeu (char matrice[T][T], joueur jou);
int joueur_next (joueur jou);
void lancer_pion (char matrice[T][T], int *lig, int *col,joueur jou);
int fin_jeu (char matrice[T][T]);
void jouer_coup (char matrice[T][T], int lig, int col, joueur jou);

#endif