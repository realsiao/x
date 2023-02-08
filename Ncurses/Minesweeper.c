//gcc -o minesweeper minesweeper.c -lncurses

/*
f：标记地雷，您将需要输入行和列的位置。
u：揭开方格，您将需要输入行和列的位置。
q：退出游戏。
*/

#include <ncurses.h>
#include <stdlib.h>
#include <time.h>

#define ROWS 7
#define COLS 7
#define MINES 10

int board[ROWS][COLS];
bool covered[ROWS][COLS];
bool flagged[ROWS][COLS];

void init_board() {
  int i, j, k;
  for (i = 0; i < ROWS; i++) {
    for (j = 0; j < COLS; j++) {
      board[i][j] = 0;
      covered[i][j] = true;
      flagged[i][j] = false;
    }
  }
  srand(time(NULL));
  for (k = 0; k < MINES; k++) {
    i = rand() % ROWS;
    j = rand() % COLS;
    if (board[i][j] == 9) {
      k--;
      continue;
    }
    board[i][j] = 9;
    for (int x = -1; x <= 1; x++) {
      for (int y = -1; y <= 1; y++) {
        if (i + x >= 0 && i + x < ROWS && j + y >= 0 && j + y < COLS
            && board[i + x][j + y] != 9) {
          board[i + x][j + y]++;
        }
      }
    }
  }
}

void print_board() {
  int i, j;
  clear();
  for (i = 0; i < ROWS; i++) {
    for (j = 0; j < COLS; j++) {
      if (covered[i][j]) {
        if (flagged[i][j])
          printw("F ");
        else
          printw("* ");
      } else {
        if (board[i][j] == 9)
          printw("X ");
        else
          printw("%d ", board[i][j]);
      }
    }
    printw("\n");
  }
  refresh();
}

void uncover_square(int row, int col) {
  if (row < 0 || row >= ROWS || col < 0 || col >= COLS || covered[row][col] == false
      || flagged[row][col] == true)
    return;
  covered[row][col] = false;
  if (board[row][col] == 0) {
    for (int x = -1; x <= 1; x++) {
      for (int y = -1; y <= 1; y++) {
        uncover_square(row + x, col + y);
      }
    }
  }
}

int main() {
  int row, col;
  char input;
  initscr();
  init_board();
  print_board();
  while (true) {
    move(0, 0);
    input = getch();
    switch (input) {
case 'f':
        printw("Enter row and col: ");
        if (scanf("%d%d", &row, &col) != 2) break;
        if (row < 0 || row >= ROWS || col < 0 || col >= COLS) break;
        flagged[row][col] = true;
        break;
  case 'u':
        printw("Enter row and col: ");
        if (scanf("%d%d", &row, &col) != 2) break;
        if (row < 0 || row >= ROWS || col < 0 || col >= COLS) break;
        if (board[row][col] == 9) {
          printw("Game Over!");
          getch();
          endwin();
          return 0;
        }
        uncover_square(row, col);
        break;

      case 'q':
        endwin();
        return 0;
    }
    print_board();
  }
  endwin();
  return 0;
}

