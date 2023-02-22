#include <tclap/CmdLine.h>
#include <iostream>

int main(int argc, char* argv[]) {
    TCLAP::CmdLine cmd("Command description message", ' ', "0.9");

    TCLAP::ValueArg<std::string> inputArg("i", "input", "Input file name", false, "input.txt", "string");
    TCLAP::ValueArg<std::string> outputArg("o", "output", "Output file name", false, "output.txt", "string");

    cmd.add(inputArg);
    cmd.add(outputArg);

    cmd.parse(argc, argv);

    std::cout << "Using input file: " << inputArg.getValue() << std::endl;
    std::cout << "Using output file: " << outputArg.getValue() << std::endl;

    return 0;
}
