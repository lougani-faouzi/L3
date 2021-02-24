#include<stdio.h>
#include"othello.h"

/* Fonction pour initialiser la grille */
void init_othellier(char matrice[T][T]) {
    
	int i, j;

    /* On met tout a vide */
    for (i=0; i<T; i++)
        for (j=0; j<T; j++)
            matrice[i][j] = ' ';

    /* On place les 4 premiers pions */
    matrice[T/2-1][T/2-1] = N; // N  est pions noirs
    matrice[T/2-1][T/2] = B;// B  est les pions blanc
    matrice[T/2][T/2-1] = N;
    matrice[T/2][T/2] = B;
}


/* Fonction pour afficher la grille */
void afficher_othellier (char matrice[T][T]) {
    
    int i, j;
    char car = 'A';

    /* Affichage des lettres */
    printf ("\n");
    for (i=0; i<T; i++) {
        printf ("  %c ", car);
        car++;
    }

    /* Affichage de la grille */
    printf ("\n+");
    for (i=0; i<T; i++)
        printf ("---+");
    printf ("\n");
    for (i=0; i<T; i++) {
        printf ("|");
        for (j=0; j<T; j++)

                printf (" %c |", matrice[i][j]); 
                
        printf (" \n%d+", i+1);
        for (j=0; j<T; j++)
            printf ("---+");
        printf ("\n");
    }
}

/* Fonction pour verifier qu'une case existe */
int verifier_case(int lig, int col) 
{
    if (((col >= 0) && (col < T) && (lig >= 0) && (lig < T)))
	return 1;
	else return 0;
}

/* Fonction pour verifier qu'un coup est valide */
int coup_correct (char matrice[T][T], int lig, int col, joueur j) 
{
    int i, k, ok;
    char j1, j_a;

    /* On definit la couleur du joueur et celle de l'adversaire */
    if (j.num == 1) {
        j1 = N;
        j_a = B;
    } else {
        j1 = B;
        j_a = N;//joeur artificeiel 
    }
    if (!verifier_case(lig, col) || matrice[lig][col] != ' ') return 0;

    /* Vertical vers le haut */
    i = lig - 1;
    ok = 0;
    while (verifier_case(i, col) && matrice[i][col] == j_a) {
        i--;
        ok = 1;
    }
    if (verifier_case(i, col) && matrice[i][col] == j1 && ok == 1) return 1;

    /* Vertical vers le bas */
    i = lig + 1;
    ok = 0;
    while (verifier_case(i, col) && matrice[i][col] == j_a) {
        i++;
        ok = 1;
    }
    if (verifier_case(i, col) && matrice[i][col] == j1 && ok == 1) return 1;

    /* Horizontal vers la gauche */
    k = col - 1;
    ok = 0;
    while (verifier_case(lig, k) && matrice[lig][k] == j_a) {
        k--;
        ok = 1;
    }
    if (verifier_case(lig, k) && matrice[lig][k] == j1 && ok == 1) return 1;

    /* Horizontal vers la droite */
    k = col + 1;
    ok = 0;
    while (verifier_case(lig, k) && matrice[lig][k] == j_a) {
        k++;
        ok = 1;
    }
    if (verifier_case(lig, k) && matrice[lig][k] == j1 && ok == 1) return 1;

    /* Diagonal \ vers le haut */
    i = lig - 1;
    k = col - 1;
    ok = 0;
    while (verifier_case(i, k) && matrice[i][k] == j_a) {
        i--;
        k--;
        ok = 1;
    }
    if (verifier_case(i, k) && matrice[i][k] == j1 && ok == 1) return 1;

    /* Diagonal \ vers le bas */
    i = lig + 1;
    k = col + 1;
    ok = 0;
    while (verifier_case(i, k) && matrice[i][k] == j_a) {
        i++;
        k++;
        ok = 1;
    }
    if (verifier_case(i, k) && matrice[i][k] == j1 && ok == 1) return 1;

    /* Diagonal / vers le haut */
    i = lig - 1;
    k = col + 1;
    ok = 0;
    while (verifier_case(i, k) && matrice[i][k] == j_a) {
        i--;
        k++;
        ok = 1;
    }
    if (verifier_case(i, k) && matrice[i][k] == j1 && ok == 1) return 1;

    /* Diagonal / vers le bas */
    i = lig + 1;
    k = col - 1;
    ok = 0;
    while (verifier_case(i, k) && matrice[i][k] == j_a) {
        i++;
        k--;
        ok = 1;
    }
    if (verifier_case(i, k) && matrice[i][k] == j1 && ok == 1) return 1;

    return 0;
}

/* Fonction qui determine si un joueur peut encore jouer */
int continuer_jeu (char matrice[T][T], joueur jou) {
    int i, j;
    for (i=0; i<T; i++)
        for (j=0; j<T; j++)
            if (coup_correct(matrice, i, j, jou)) return 1; /* Le joueur peut encore jouer */

    /* Le joueur ne peut plus jouer */
    return 0;
}

/* Renvoie le numero du joueur suivant */
int joueur_next (joueur jou) {
    return (jou.num %2 + 1);
}

/* Permet au joueur de choisir un coup */
void lancer_pion (char matrice[T][T], int *lig, int *col,joueur jou)
 {
    char car;
    printf ("\nC'est au tour du joueur %d de jouer\n", jou.num);
    printf ("Choisissez une case (ex: A1) :\n");
    scanf ("\n%c", &car);
    /* On change les minuscules en majuscules */
    if ((car >= 'a') && (car < 'a'+T))
        car = car + 'A' - 'a';
    (*col) = car - 'A';
    scanf ("%d", lig);
    (*lig)--;

    /* On redemande de choisir tant que le coup n'est pas accepte */
    while (!coup_correct (matrice, *lig, *col, jou)) {
        printf ("\nCe coup n'est pas valide\n");
        printf ("Choisissez une autre case (ex: A1) :\n");
        scanf ("\n%c", &car);
        /* On change les minuscules en majuscules */
        if ((car >= 'a') && (car < 'a'+T))
            car = car + 'A' - 'a';
        (*col) = car - 'A';
        scanf ("%d", lig);
        (*lig)--;
    }
}

/* Verifie si la partie est terminee */
int fin_jeu (char matrice[T][T]) {
    int i, j, SN, SB, compteur;
    joueur jou1, jou2;
	jou1.num = 1; jou2.num = 2;
    /* On compte les pions noirs et les blancs */
    SN = 0;  //la somme des pions noirs
    SB = 0;
    for (i=0; i<T; i++) {
        for (j=0; j<T; j++) {
            if (matrice[i][j] == ' ' && (continuer_jeu(matrice, jou1) || continuer_jeu(matrice, jou2))) {
                return 0; /* La partie n'est pas finie */
            } else {
                if (matrice[i][j] == N) SN++;
                else if (matrice[i][j] == B) SB++;
            }
        }
    }

    /* La partie est terminee, on affiche le gagnant */
    if (SN > SB)
        printf ("\nLe joueur 1 a gagne !!!\n");
    else if (SB > SN)
        printf ("\nLe joueur 2 a gagne !!!\n");
    else printf ("\nLes deux joueurs sont a egalite\n");

    /* On range les pions par couleur et on affiche la grille */
    compteur = 0;
    for (i=0; i<T; i++)
        for (j=0; j<T; j++) {
            if (compteur < SN)
                matrice[i][j] = N;
            else if ((compteur >= SN) && (compteur < SN + SB -1))
                matrice[i][j] = B;
            else matrice[i][j] = ' ';
                compteur++;
        }
    afficher_othellier (matrice);
    printf ("\n");
    return 1;
}

/* Fonction qui permet de jouer un coup */
void jouer_coup (char matrice[T][T], int lig, int col, joueur jou) {
    int i, j;
    char j1, j_a;

    if (jou.num == 1) {
        j1 = N;
        j_a = B;
    } else {
        j1 = B;
        j_a = N;
    }
    matrice[lig][col] = j1;

    /* Vertical vers le haut */
    i = lig - 1;
    while (verifier_case(i, col) && matrice[i][col] == j_a) i--;
    if (verifier_case(i, col) && matrice[i][col] == j1) {
        i = lig - 1;
        while (matrice[i][col] == j_a) {
            matrice[i][col] = j1;
            i--;
        }
    }

    /* Vertical vers le bas */
    i = lig + 1;
    while (verifier_case(i, col) && matrice[i][col] == j_a) i++;
    if (verifier_case(i, col) && matrice[i][col] == j1) {
        i = lig + 1;
        while (matrice[i][col] == j_a) {
            matrice[i][col] = j1;
            i++;
        }
    }

    /* Horizontal vers la gauche */
    j = col - 1;
    while (verifier_case(lig, j) && matrice[lig][j] == j_a) j--;
    if (verifier_case(lig, j) && matrice[lig][j] == j1) {
        j = col - 1;
        while (matrice[lig][j] == j_a) {
            matrice[lig][j] = j1;
            j--;
        }
    }

    /* Horizontal vers la droite */
    j = col + 1;
    while (verifier_case(lig, j) && matrice[lig][j] == j_a) j++;
    if (verifier_case(lig, j) && matrice[lig][j] == j1) {
        j = col + 1;
        while (matrice[lig][j] == j_a) {
            matrice[lig][j] = j1;
            j++;
        }
    }

    /* Diagonal \ vers le haut */
    i = lig - 1;
    j = col - 1;
    while (verifier_case(i, j) && matrice[i][j] == j_a) {
        i--;
        j--;
    }
    if (verifier_case(i, j) && matrice[i][j] == j1) {
        i = lig - 1;
        j = col - 1;
        while (matrice[i][j] == j_a) {
            matrice[i][j] = j1;
            i--;
            j--;
        }
    }

    /* Diagonal \ vers le bas */
    i = lig + 1;
    j = col + 1;
    while (verifier_case(i, j) && matrice[i][j] == j_a) {
        i++;
        j++;
    }
    if (verifier_case(i, j) && matrice[i][j] == j1) {
        i = lig + 1;
        j = col + 1;
        while (matrice[i][j] == j_a) {
            matrice[i][j] = j1;
            i++;
            j++;
        }
    }

    /* Diagonal / vers le haut */
    i = lig - 1;
    j = col + 1;
    while (verifier_case(i, j) && matrice[i][j] == j_a) {
        i--;
        j++;
    }
    if (verifier_case(i, j) && matrice[i][j] == j1) {
        i = lig - 1;
        j = col + 1;
        while (matrice[i][j] == j_a) {
            matrice[i][j] = j1;
            i--;
            j++;
        }
    }

    /* Diagonal \ vers le bas */
    i = lig + 1;
    j = col - 1;
    while (verifier_case(i, j) && matrice[i][j] == j_a) {
        i++;
        j--;
    }
    if (verifier_case(i, j) && matrice[i][j] == j1) {
        i = lig + 1;
        j = col - 1;
        while (matrice[i][j] == j_a) {
            matrice[i][j] = j1;
            i++;
            j--;
        }
    }
}