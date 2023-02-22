#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>

int main(int argc, char *argv[]) {
    int opt;
    char *input_file = "input.txt";
    char *output_file = "output.txt";

    while ((opt = getopt(argc, argv, "i:o:")) != -1) {
        switch (opt) {
        case 'i':
            input_file = optarg;
            break;
        case 'o':
            output_file = optarg;
            break;
        default: /* '?' */
            fprintf(stderr, "Usage: %s [-i input_file] [-o output_file]\n",
                    argv[0]);
            exit(EXIT_FAILURE);
        }
    }

    printf("Using input file: %s\n", input_file);
    printf("Using output file: %s\n", output_file);

    return 0;
}
