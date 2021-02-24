
#include "Terrain.h"
#include "window.h"
#include "brick.h"


Terrain::Terrain():posX(0),posY(0),width(0),height(0),window(1, 1, 90, 90, ' ') {
  window.setCouleurBordure(BWHITE);
  window.setCouleurFenetre(WBLACK);
}


Terrain::Terrain(int x, int y, int w, int h): posX(x), posY(y), width(w), height(h),window(h, w, x, y, '+') {
  window.setCouleurBordure(BWHITE);
  window.setCouleurFenetre(WBLACK);

}

int Terrain::get_posX() const {
  	return posX;
}
int Terrain::get_posY() const {
  	return posY;
}
int Terrain::get_width() const {
  	return width;
}
int Terrain::get_height() const {
  	return height;
}

void Terrain::set_posX(int x) {
  	posX = (x>=0)?x:0;
}
void Terrain::set_posY(int y) {
  	posY = (y>=0)?y:0;
}
void Terrain::set_width(int w) {
	width = (w>=0)?w:10;
}
void Terrain::set_height(int h) {
	height = (h>=0)?h:10;
}

Window* Terrain::GetWindow() {
  return &window;
}
const Window* Terrain::GetWindow() const {
  return &window;
}
void Terrain::clear () {
  window.clear();
}
