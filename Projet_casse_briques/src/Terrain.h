#ifndef __TERRAIN
#define __TERRAIN

#include "window.h"

class Terrain {

private:
  int posX;
  int posY;
  int width;
  int height;
  Window window;

public:
  Terrain();
  Terrain(int, int, int, int);

  int get_posX() const;
  int get_posY() const;
  int get_width() const;
  int get_height() const;

  void set_posX(int);
  void set_posY(int);
  void set_width(int);
  void set_height(int);

  Window* GetWindow ();
  const Window* GetWindow () const;

  void clear ();
};

#endif
